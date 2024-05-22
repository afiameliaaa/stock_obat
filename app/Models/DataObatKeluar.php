<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataObatKeluar extends Model
{
    use HasFactory;

    protected $table = 'obat_keluar';

    protected $primaryKey = 'kode_obat';

    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'tanggal_keluar',
        'kategori_obat',
        'satuan',
        'sisa'
    ];
}