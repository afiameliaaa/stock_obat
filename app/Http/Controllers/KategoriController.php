<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index() {
        $kategori = Kategori::all();
        return view('data_kategori.index', compact('kategori'));
    }

    public function create() {
        return view('data_kategori.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id) {
        $kategori = Kategori::findOrFail($id);
        return view('data_kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id) {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}