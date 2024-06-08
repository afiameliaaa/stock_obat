<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataObat;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\DataObatKeluar;

class ObatKeluarController extends Controller
{
    public function index()
    {
        return view('data_obat_keluar.obat_keluar', [
            'obatKeluar' => DataObatKeluar::orderBy('tanggal_keluar', 'desc')->get()
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'kode_obat' => 'required',
                'kategori' => 'required',
                'satuan' => 'required',
                'tanggal_keluar' => 'required|date',
                'stok_kurang' => 'required|integer',
            ]);

            $findObat = DataObat::where('kode_obat', $request->kode_obat)->first();
            $dataObat = DataObat::find($findObat->id);

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

                return redirect()->route('obat.keluar.index')->with('success', 'Data Obat Keluar berhasil ditambahkan');
            } else {
                return redirect()->back()->withErrors(['stok_kurang' => 'Stok tidak mencukupi']);
            }
        }

        return view('data_obat_keluar.create', [
            'dataObat' => DataObat::all(),
            'kategori' => Kategori::all(),
            'satuan' => Satuan::all(),
        ]);
    }
}
