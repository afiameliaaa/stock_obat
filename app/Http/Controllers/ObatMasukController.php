<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataObat;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\DataObatMasuk;

class ObatMasukController extends Controller
{
    public function index(){
        $obatMasuk = DataObatMasuk::all();
        return view('data_obat_masuk.obat_masuk', compact('obatMasuk'));
    }

    public function create(){
        $dataObat = DataObat::all();
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        return view('data_obat_masuk.create', compact('dataObat', 'kategori', 'satuan'));
    }

    public function store(Request $request){
        $request->validate([
            'kode_obat' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'tanggal_masuk' => 'required|date',
            'jumlah' => 'required|integer',
        ]);

        $dataObat = DataObat::find($request->kode_obat);

        if ($dataObat) {
            $dataObat->stok += $request->jumlah;
            $dataObat->save();

            DataObatMasuk::create([
                'kode_obat' => $dataObat->kode_obat,
                'nama_obat' => $dataObat->nama_obat,
                'tanggal_masuk' => $request->tanggal_masuk,
                'kategori_obat' => $request->kategori,
                'satuan' => $request->satuan,
                'jumlah' => $request->jumlah
            ]);

            return redirect()->route('obat_masuk.index')->with('success', 'Data Obat Masuk berhasil ditambahkan');
        } else {
            return redirect()->back()->withErrors(['kode_obat' => 'Obat tidak ditemukan']);
        }
    }
}