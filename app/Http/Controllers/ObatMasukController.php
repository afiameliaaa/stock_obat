<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataObat;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\DataObatMasuk;

class ObatMasukController extends Controller
{
    public function index()
    {
        return view('data_obat_masuk.obat_masuk', [
            'obatMasuk' => DataObatMasuk::orderBy('tanggal_masuk', 'desc')->get(),
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'kode_obat' => 'required',
                'kategori' => 'required',
                'satuan' => 'required',
                'tanggal_masuk' => 'required|date',
                'jumlah' => 'required|integer',
            ]);

            $findObat = DataObat::where('kode_obat', $request->kode_obat)->first();
            $dataObat = DataObat::find($findObat->id);

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

                return redirect()->route('obat.masuk.index')->with('success', 'Data Obat Masuk berhasil ditambahkan');
            } else {
                return redirect()->back()->withErrors(['kode_obat' => 'Obat tidak ditemukan']);
            }
        }

        return view('data_obat_masuk.create',[
            'dataObat' => DataObat::all(),
            'kategori' => Kategori::all(),
            'satuan' => Satuan::all(),
        ]);
    }
}
