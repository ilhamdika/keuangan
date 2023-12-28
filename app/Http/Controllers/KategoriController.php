<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Jenis;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $jenis = Jenis::all();
        $jenisPengeluaran = Jenis::where('kategori_id', $kategori->last()->id)->get();
        return view('pages.kategori.index', [
            'kategori' => $kategori,
            'jenis' => $jenis,
            'jenisPengeluaran' => $jenisPengeluaran
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'kategori_id' => 'required'
        ]);

        Jenis::create([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();

        return redirect()->route('kategori.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'kategori_id' => 'required'
        ]);

        $jenis = Jenis::findOrFail($id);
        $jenis->update([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('kategori.index');
    }

    public function show($id)
    {
        $jenis = Jenis::findOrFail($id);
        $kategori = Kategori::all();
        return view('pages.kategori.edit', [
            'jenis' => $jenis,
            'kategori' => $kategori
        ]);
    }
}
