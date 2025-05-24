<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeniskosakata extends Model
{
    //
    use HasFactory, HasUlids;
    protected $table = "jenis_kosakata";
    protected $fillable = [
        "jenis_kosakata",
        
    ];
    public function kosakata()
    {
        return $this->hasMany(Kosakata::class);
    }
}
