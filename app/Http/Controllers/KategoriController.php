<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($kategori)
    {
        return view('kategori', [
            'data' => Buku::all()->where('kategori', $kategori)->sortByDesc('id'),
            'active' => 'Kategori',
            'data2' => Buku::get()->where('kategori', $kategori)->last(),
            'judul' => 'Semua kategori ' . $kategori,
            'gambar' => asset('icon-bookita-fix.png')
        ]);
    }

    public function semua(Request $request)
    {
        $cari = $request->cari;
        $data = Buku::get()->sortByDesc('id');

        $data = Buku::where('nama', 'like', '%' . $cari . '%')->orWhere('judul', 'like', '%' . $cari . '%')->get();

        if ($data->all() === []) {
            return view('/not-found', [
                'data' => $cari
            ]);
        } else {
            $data2 = $data->first();

            return view('kategori', [
                'data' => $data,
                'active' => 'Kategori',
                'data2' => $data2,
                'judul' => 'Semua Buku ' . $request->cari,
                'gambar' => asset('icon-bookita-fix.png')
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
