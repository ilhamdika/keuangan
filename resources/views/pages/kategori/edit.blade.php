@extends('layouts.app')

@section('content')

<form action="{{ route('kategori.update', $jenis->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama">Nama Kategori</label>
        <input type="text" name="nama" id="nama" value="{{$jenis->nama}}" class="form-control" placeholder="Masukkan nama kategori">
    </div>
    <div class="form-group">
        <label for ="kategori_id">Jenis</label>
        <select name="kategori_id" id="kategori_id" class="form-control">
            @foreach ($kategori as $k)
            <option value="{{$k->id}}">{{$k->nama}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection