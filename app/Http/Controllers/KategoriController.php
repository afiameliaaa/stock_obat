<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        return view('data_kategori.index', [
            'kategori' => Kategori::all(),
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'nama_kategori' => 'required|string|max:255'
            ]);

            Kategori::create([
                'nama_kategori' => $request->nama_kategori
            ]);

            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
        }

        return view('data_kategori.create');
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        if ($request->isMethod('POST')) {
            $request->validate([
                'nama_kategori' => 'required|string|max:255'
            ]);

            $kategori->update([
                'nama_kategori' => $request->nama_kategori
            ]);

            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
        }

        return view('data_kategori.edit', [
            'kategori' => $kategori
        ]);
    }

    public function delete($id) {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
