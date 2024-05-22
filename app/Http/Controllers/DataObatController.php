<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataObat;

class DataObatController extends Controller
{
    public function index()
    {
        $data_obat = DataObat::all();
        return view('data_obat.index', compact('data_obat'));
    }

    public function create()
    {
        return view('data_obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:data_obat',
            'nama_obat' => 'required',
            'tanggal_expired' => 'required|date',
            'stok' => 'integer|min:0',
        ]);

        DataObat::create($request->all());

        return redirect()->route('data_obat.index')->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function edit($kode_obat)
    {
        $data_obat = DataObat::findOrFail($kode_obat);
        return view('data_obat.edit', compact('data_obat'));
    }

    public function update(Request $request, $kode_obat)
    {
        $request->validate([
            'nama_obat' => 'required',
            'tanggal_expired' => 'required|date',
            'stok' => 'integer|min:0',
        ]);

        $data_obat = DataObat::findOrFail($kode_obat);
        $data_obat->update($request->all());

        return redirect()->route('data_obat.index')->with('success', 'Data obat berhasil diperbarui.');
    }

    public function destroy($kode_obat)
    {
        $data_obat = DataObat::findOrFail($kode_obat);
        $data_obat->delete();

        return redirect()->route('data_obat.index')->with('success', 'Data obat berhasil dihapus.');
    }
}