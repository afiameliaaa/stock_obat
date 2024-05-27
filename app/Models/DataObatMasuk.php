<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataObatMasuk extends Model
{
    use HasFactory;

    protected $table = 'obat_masuk';

    protected $primaryKey = 'kode_obat';

    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'tanggal_masuk',
        'kategori_obat',
        'satuan',
        'jumlah'
    ];
}