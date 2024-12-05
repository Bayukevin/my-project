<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar'; 

    protected $fillable = [
        'artikel_id',
        'isi_komentar',
    ];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
}
