<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

    protected $fillable = [
        'judul',
        'penulis',
        'sub_judul',
        'images',
        'status',
        'isi_artikel',
    ];

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
}
