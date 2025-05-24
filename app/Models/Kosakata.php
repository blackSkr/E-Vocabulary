<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kosakata extends Model
{
    //
    use HasFactory, HasUlids;
    protected $table = "kosakata";

    protected $fillable = [
        "user_id",
        "jenis_kosakata_id",
        "kata_indo",
        "kata_inggris",
        "slug",
        "suara",
        'contoh_penerapan',
        "contoh_gambar",
        "status",
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
public function jenis_kosakata()
{
    return $this->belongsTo(Jeniskosakata::class);
}

}
