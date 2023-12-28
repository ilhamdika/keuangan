@extends('layouts.app')

@section('content')

<form action="{{ route('transaksi.update', $transaksi->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nominal">Jumlah</label>
        <input type="number" name="nominal" id="nominal" value="{{$transaksi->nominal}}" class="form-control" placeholder="Masukkan jumlah">
    </div>
    <div class="form-group">
        <label for ="kategori_id">Kategori</label>
        <select name="kategori_id" id="kategori_id" class="form-control">
            @foreach ($kategori as $k)
            <option value="{{$k->id}}" {{ $k->id == $k->id ? 'selected' : ''}}>{{$k->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for ="jenis_id">Jenis</label>
        <select name="jenis_id" id="jenis_id" class="form-control">
            @foreach ($jenis as $j)
            <option value="{{$j->id}}" {{ $j->id == $j->id ?  'selected' : ''}}>{{$j->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" name="deskripsi" id="deskripsi" value="{{$transaksi->deskripsi}}" class="form-control" placeholder="Masukkan deskripsi">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection