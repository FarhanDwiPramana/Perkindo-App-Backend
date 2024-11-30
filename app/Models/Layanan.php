<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     */
    protected $table = 'layanan';

    /**
     * Field yang dapat diisi (mass assignable).
     */
    protected $fillable = [
        'type', // jenis layanan (non_konstruksi, sbu_konstruksi, membership_requirements, member_info)
        'data', // data JSON yang disimpan
    ];

    /**
     * Cast field tertentu ke tipe data yang diinginkan.
     */
    protected $casts = [
        'data' => 'array', // Mengonversi data JSON menjadi array
    ];
}
