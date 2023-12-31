<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Saldo;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $jenis = Jenis::all();
        $kategori = Kategori::all();
        $transaksi = Transaksi::all();
        return view('pages.transaksi.index', [
            'jenis' => $jenis,
            'kategori' => $kategori,
            'transaksi' => $transaksi
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_id' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'nominal' => 'required',
        ]);

        $kategori = Kategori::findOrFail($request->kategori_id);
        Transaksi::create([
            'jenis_id' => $request->jenis_id,
            'kategori_id' => $request->kategori_id,
            'deskripsi' => $request->deskripsi,
            'nominal' => $request->nominal,
        ]);




        $saldo = Saldo::first();
        if ($kategori->nama == 'Pemasukan') {
            $saldo->update([
                'nominal' => $saldo->nominal + $request->nominal,
                'total_pemasukan' => $saldo->total_pemasukan + $request->nominal
            ]);
        } else {
            $saldo->update([
                'nominal' => $saldo->nominal - $request->nominal,
                'total_pengeluaran' => $saldo->total_pengeluaran + $request->nominal
            ]);
        }

        return redirect()->route('transaksi.index');
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $kategori = Kategori::all();
        $jenis = Jenis::all();
        return view('pages.transaksi.edit', [
            'transaksi' => $transaksi,
            'kategori' => $kategori,
            'jenis' => $jenis
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_id' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'nominal' => 'required',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'jenis_id' => $request->jenis_id,
            'kategori_id' => $request->kategori_id,
            'deskripsi' => $request->deskripsi,
            'nominal' => $request->nominal,
        ]);

        $saldo = Saldo::first();
        $kategori = Kategori::findOrFail($request->kategori_id);
        if ($kategori->nama == 'Pemasukan') {
            $saldo->update([
                'nominal' => $saldo->nominal - $transaksi->nominal + $request->nominal,
                'total_pemasukan' => $saldo->total_pemasukan - $transaksi->nominal + $request->nominal
            ]);
        } else {
            $saldo->update([
                'nominal' => $saldo->nominal + $transaksi->nominal - $request->nominal,
                'total_pengeluaran' => $saldo->total_pengeluaran - $transaksi->nominal + $request->nominal
            ]);
        }

        return redirect()->route('transaksi.index');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index');
    }
}
