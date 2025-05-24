<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    //
    use HasFactory, HasUlids;

    protected $table = "jurusan";
    protected $fillable = [
        "nama_jurusan",
        "status",
    ];
    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }
}
