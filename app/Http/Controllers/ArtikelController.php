<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;


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

        if ($request->routeIs('blog')) {
            $artikelsBlog = Artikel::where('status', 'publish')
                               ->latest()  // Urutkan berdasarkan yang terbaru
                               ->take(2)   // Ambil hanya 2 artikel terbaru
                               ->get();

            return view('blog', compact('artikelsBlog')); // Atau bisa menggunakan view khusus jika ada view untuk blog
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

    public function edit($id)
    {
        // Ambil artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Tampilkan halaman edit dengan data artikel
        return view('editProject', compact('artikel'));
    }

    // Menyimpan perubahan artikel
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'images' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'isi_artikel' => 'required|string',
            'status' => 'required|in:private,publish',
        ]);

        // Cari artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Menyimpan gambar jika ada
        $imagePath = $artikel->images;  // Menggunakan gambar lama jika tidak ada yang baru
        if ($request->hasFile('images')) {
            // Hapus gambar lama jika ada
            if ($artikel->images) {
                \Storage::delete('public/' . $artikel->images);
            }
            // Simpan gambar baru
            $imagePath = $request->file('images')->store('artikel_images', 'public');
        }

        // Update artikel
        $artikel->update([
            'judul' => $validated['judul'],
            'sub_judul' => $validated['sub_judul'],
            'penulis' => $validated['penulis'],
            'images' => $imagePath,
            'isi_artikel' => $validated['isi_artikel'],
            'status' => $validated['status'],
        ]);

        // Redirect ke halaman project dengan pesan sukses
        return redirect()->route('projects')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function show($id)
    {
        // Ambil artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Kirim data artikel ke view
        return view('detailProject', compact('artikel'));
    }

    public function publish($id)
    {
        // Temukan artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Perbarui status artikel menjadi 'publish'
        $artikel->update([
            'status' => 'publish',
        ]);

        return redirect()->back()->with('success', 'Artikel berhasil dipublikasikan!');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->images) {
            Storage::disk('public')->delete($artikel->images);
        }

        $artikel->delete();

        return redirect()->route('projects')->with('success', 'Artikel berhasil dihapus!');
    }


}
