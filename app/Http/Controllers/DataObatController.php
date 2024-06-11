<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataObat;

class DataObatController extends Controller
{
    public function index()
    {
        $data_obat = DataObat::orderBy('nama_obat', 'asc')->get();
        return view('data_obat.index', [
            'data_obat' => $data_obat
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'kode_obat' => 'required|unique:data_obat',
                'nama_obat' => 'required',
                'tanggal_expired' => 'required|date',
                'stok' => 'integer|min:0',
            ]);

            DataObat::create($request->all());

            return redirect()->route('obat.index')->with('success', 'Data obat berhasil ditambahkan.');
        }

        return view('data_obat.create');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'nama_obat' => 'required',
                'tanggal_expired' => 'required|date',
                'stok' => 'integer|min:0',
            ]);

            $data_obat = DataObat::findOrFail($id);
            $data_obat->update($request->all());

            return redirect()->route('obat.index')->with('success', 'Data obat berhasil diperbarui.');
        }

        $data_obat = DataObat::findOrFail($id);
        return view('data_obat.edit', compact('data_obat'));
    }

    public function delete($kode)
    {
        $data_obat = DataObat::findOrFail($kode);
        $data_obat->delete();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus.');
    }
}
