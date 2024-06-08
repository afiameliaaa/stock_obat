<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use App\Models\DataObatMasuk;
use App\Models\DataObatKeluar;
use Dompdf\Dompdf;
use Dompdf\Options;

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

    public function printPdf()
    {
        $data_obat = DataObat::all();

        foreach ($data_obat as $obat) {
            $obat->obat_masuk = DataObatMasuk::where('kode_obat', $obat->kode_obat)->get();
            $obat->obat_keluar = DataObatKeluar::where('kode_obat', $obat->kode_obat)->get();
        }

        $pdf = new Dompdf();
        $pdf->loadHtml(view('laporan_pdf', compact('data_obat')));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream('laporan.pdf', array('Attachment' => 0));
    }
}
