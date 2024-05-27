<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataObat;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\DataObatKeluar;

class ObatKeluarController extends Controller
{
    public function index(){
        $obatKeluar = DataObatKeluar::orderBy('tanggal_keluar', 'desc')->paginate(5);
        return view('data_obat_keluar.obat_keluar', compact('obatKeluar'));
    }    

    public function create(){
        $dataObat = DataObat::all();
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        return view('data_obat_keluar.create', compact('dataObat', 'kategori', 'satuan'));
    }

    public function store(Request $request){
        $request->validate([
            'kode_obat' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'tanggal_keluar' => 'required|date',
            'stok_kurang' => 'required|integer',
        ]);

        $dataObat = DataObat::find($request->kode_obat);

        if ($dataObat && $dataObat->stok >= $request->stok_kurang) {
            $dataObat->stok -= $request->stok_kurang;
            $dataObat->save();

            DataObatKeluar::create([
                'kode_obat' => $dataObat->kode_obat,
                'nama_obat' => $dataObat->nama_obat,
                'tanggal_keluar' => $request->tanggal_keluar,
                'kategori_obat' => $request->kategori,
                'satuan' => $request->satuan,
                'sisa' => $request->stok_kurang
            ]);

            return redirect()->route('obat_keluar.index')->with('success', 'Data Obat Keluar berhasil ditambahkan');
        } else {
            return redirect()->back()->withErrors(['stok_kurang' => 'Stok tidak mencukupi']);
        }
    }
}