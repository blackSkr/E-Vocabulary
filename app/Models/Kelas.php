<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    use HasFactory, HasUlids;
    protected $table = "kelas";
    protected $fillable = [
        "nama_kelas",
        "prodi_id",
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    public function users()
    {
        return $this->hasMany(User::class, 'kelas_id');
    }
}
