<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{

    public function index(Request $request)
    {
        // Jika rute yang dipanggil adalah halaman 'home', ambil artikel dengan status 'publish'
        if ($request->routeIs('home')) {
            $artikels = Artikel::where('status', 'publish')->get();
            return view('home', compact('artikels'));
        }

        if ($request->routeIs('projects')) {
            $artikelsPublish = Artikel::whereIn('status', ['publish'])->get();
            $artikelsPrivate = Artikel::whereIn('status', ['private'])->get();
            return view('project', compact('artikelsPublish', 'artikelsPrivate'));
        }

        // Default return jika tidak ada kondisi yang dipenuhi
        return redirect()->route('home');
    }

    public function create()
    {
        return view('addProject');
    }

    public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'sub_judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'images' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'isi_artikel' => 'required|string',
        'status' => 'required|in:private,publish', // Validasi status
    ]);

    // Menyimpan gambar jika ada
    $imagePath = null;
    if ($request->hasFile('images')) {
        $imagePath = $request->file('images')->store('artikel_images', 'public');
    }

    // Simpan artikel ke database
    Artikel::create([
        'judul' => $validated['judul'],
        'sub_judul' => $validated['sub_judul'],
        'penulis' => $validated['penulis'],
        'images' => $imagePath,
        'isi_artikel' => $validated['isi_artikel'],
        'status' => $validated['status'], // Menambahkan status ke data yang disimpan
    ]);

    // Redirect ke home setelah berhasil menyimpan artikel
    return redirect()->route('home')->with('success', 'Artikel berhasil disimpan!');
}

}
