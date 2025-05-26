<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    //
    use HasFactory, HasUlids;

    protected $table = "laporan";
    protected $fillable = [
        "nama_pelapor",
        "email_pelapor",
        "no_hp",
        "bukti_laporan",
        "status",
        "tanggal_selesai",
    ];
}
