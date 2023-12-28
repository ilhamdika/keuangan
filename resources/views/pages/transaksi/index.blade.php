@extends('layouts.app')

@section('content')

    <h1>Add transaksi</h1>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nominal">Jumlah</label>
            <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Masukkan jumlah">
        </div>
        <div class="form-group">
            <label for ="kategori_id">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control">
                @foreach ($kategori as $k)
                <option value="{{$k->id}}">{{$k->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for ="jenis_id">Jenis</label>
            <select name="jenis_id" id="jenis_id" class="form-control">
                @foreach ($jenis as $j)
                <option value="{{$j->id}}">{{$j->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>


    <table class="table">
        <thead>
          <tr>
            <th scope="col">Tanggal</th>
            <th scope="col">Nominal</th>
            <th scope="col">Kategori</th>
            <th scope="col">Jenis</th>
            <th scope="col">Deskripsi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $trans)
            <tr>
                <td>{{ $trans->created_at }}</td>
                <td>{{ $trans->nominal }}</td>
                <td>{{ $trans->kategori->nama }}</td>
                <td>{{ $trans->jenis->nama }}</td>
                <td>{{ $trans->deskripsi }}</td>
                <td>
                    <a href="{{ route('transaksi.show', $trans->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('transaksi.destroy', $trans->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>

@endsection