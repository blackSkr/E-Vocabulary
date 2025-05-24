<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    //
    use HasFactory, HasUlids;

    protected $table = "prodi";

    protected $fillable = [
        'nama_prodi',
        'status',
    ];
        public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
