<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;

class SatuanController extends Controller
{
    public function index() {
        $satuan = Satuan::paginate(5);
        return view('data_satuan.index', compact('satuan'));
    }

    public function create() {
        return view('data_satuan.create');
    }

    public function store(Request $request) {
        $request->validate([
            'satuan' => 'required|string|max:255'
        ]);

        Satuan::create([
            'satuan' => $request->satuan
        ]);

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan');
    }

    public function edit($id) {
        $satuan = Satuan::findOrFail($id);
        return view('data_satuan.edit', compact('satuan'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'satuan' => 'required|string|max:255'
        ]);

        $satuan = Satuan::findOrFail($id);
        $satuan->update([
            'satuan' => $request->satuan
        ]);

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil diperbarui');
    }

    public function destroy($id) {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus');
    }
}