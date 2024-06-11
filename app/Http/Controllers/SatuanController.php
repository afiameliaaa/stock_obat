<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;

class SatuanController extends Controller
{
    public function index()
    {
        return view('data_satuan.index', [
            'satuan' => Satuan::all(),
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'satuan' => 'required|string|max:255'
            ]);

            Satuan::create([
                'satuan' => $request->satuan
            ]);

            return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan');
        }

        return view('data_satuan.create');
    }

    public function update(Request $request, $id)
    {
        $satuan = Satuan::findOrFail($id);

        if ($request->isMethod('POST')) {
            $request->validate([
                'satuan' => 'required|string|max:255'
            ]);

            $satuan->update([
                'satuan' => $request->satuan
            ]);

            return redirect()->route('satuan.index')->with('success', 'Satuan berhasil diperbarui');
        }

        return view('data_satuan.edit', [
            'satuan' => $satuan
        ]);
    }

    public function delete($id)
     {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus');
    }
}
