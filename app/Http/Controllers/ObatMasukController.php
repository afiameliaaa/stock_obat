<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObatMasukController extends Controller
{
    public function index(){
        return view('obat_masuk');
    }
}