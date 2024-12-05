<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use App\Models\Artikel;

class KomentarController extends Controller
{
    public function store(Request $request, $artikel_id)
    {
        $validated = $request->validate([
            'isi_komentar' => 'required|string|max:1000',
        ]);

        $artikel = Artikel::findOrFail($artikel_id);

        Komentar::create([
            'artikel_id' => $artikel->id,
            'isi_komentar' => $validated['isi_komentar'],
        ]);

        return redirect()->route('blog', $artikel->id)->with('success', 'Komentar berhasil ditambahkan.');
    }
}
