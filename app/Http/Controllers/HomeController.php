<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use App\Models\DataObatMasuk;
use App\Models\DataObatKeluar;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahObat = DataObat::count();
        $jumlahObatMasuk = DataObatMasuk::count();
        $jumlahObatKeluar = DataObatKeluar::count();

        $year = Carbon::now()->year;

        $obatMasukPerBulan = DataObatMasuk::selectRaw('DATE(tanggal_masuk) as tanggal, SUM(jumlah) as jumlah')
            ->whereYear('tanggal_masuk', $year)
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $obatKeluarPerBulan = DataObatKeluar::selectRaw('DATE(tanggal_keluar) as tanggal, SUM(sisa) as jumlah')
            ->whereYear('tanggal_keluar', $year)
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        return view('home', compact('jumlahObat', 'jumlahObatMasuk', 'jumlahObatKeluar', 'obatMasukPerBulan', 'obatKeluarPerBulan'));
    }
}