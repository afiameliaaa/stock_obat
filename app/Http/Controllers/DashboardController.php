<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use App\Models\DataObatMasuk;
use App\Models\DataObatKeluar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
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

        return view('home', [
            'jumlahObat' => $jumlahObat,
            'jumlahObatMasuk' => $jumlahObatMasuk,
            'jumlahObatKeluar' => $jumlahObatKeluar,
            'obatMasukPerBulan' => $obatMasukPerBulan,
            'obatKeluarPerBulan' => $obatKeluarPerBulan
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully!');
    }
}
