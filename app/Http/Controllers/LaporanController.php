<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use App\Models\DataObatMasuk;
use App\Models\DataObatKeluar;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\File;

class LaporanController extends Controller
{
    public function index()
    {
        $data_obat = DataObat::all();

        foreach ($data_obat as $obat) {
            $obat->obat_masuk = DataObatMasuk::where('kode_obat', $obat->kode_obat)->get();
            $obat->obat_keluar = DataObatKeluar::where('kode_obat', $obat->kode_obat)->get();
        }

        return view('laporan', [
            'data_obat' => $data_obat
        ]);
    }

    public function print()
    {
        $data_obat = DataObat::all();

        foreach ($data_obat as $obat) {
            $obat->obat_masuk = DataObatMasuk::where('kode_obat', $obat->kode_obat)->get();
            $obat->obat_keluar = DataObatKeluar::where('kode_obat', $obat->kode_obat)->get();
        }

        //dd($data_obat);
        $path = public_path('assets/Polije.png');
        if (!File::exists($path)) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = File::get($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = new Dompdf();
        $pdf->loadHtml(view('laporan_pdf', compact('data_obat', 'base64')));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream('laporan.pdf', array('Attachment' => 0));
    }
}
