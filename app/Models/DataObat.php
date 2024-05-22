<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataObat extends Model
{
    use HasFactory;

    protected $table = 'data_obat';

    protected $primaryKey = 'kode_obat';

    protected $fillable = ['kode_obat', 'nama_obat', 'tanggal_masuk', 'tanggal_keluar', 'tanggal_expired', 'stok'];
}