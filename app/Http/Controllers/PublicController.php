<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\KategoriArtikel;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $kategori_id = $request->query('kategori');

        $query = Artikel::with(['penulis', 'kategori'])->orderBy('id', 'desc');

        if ($kategori_id) {
            $query->where('id_kategori', $kategori_id);
        }

        $artikel = $query->paginate(5);

        // Mengambil kategori beserta jumlah artikel di dalamnya
        $semuaKategori = KategoriArtikel::withCount('artikel')->orderBy('nama_kategori', 'asc')->get();
        $totalArtikel = Artikel::count();

        return view('public.index', compact('artikel', 'semuaKategori', 'totalArtikel', 'kategori_id'));
    }

    public function show($id)
    {
        $artikel = Artikel::with(['penulis', 'kategori'])->findOrFail($id);

        $artikelTerkait = Artikel::where('id_kategori', $artikel->id_kategori)
                                 ->where('id', '!=', $id)
                                 ->orderBy('id', 'desc')
                                 ->take(5)
                                 ->get();

        return view('public.show', compact('artikel', 'artikelTerkait'));
    }
}
