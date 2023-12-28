@extends('layouts.app')

@section('content')

    

    {{-- <h1>Kategori</h1>
    <ul>
        @foreach ($kategori as $kategori)
            <li>{{ $kategori->nama }}</li>
        @endforeach
    </ul> --}}

    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Jenis</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($jenis as $j)
            <tr>
                <td>{{ $j->nama }}</td>
                <td>{{ $j->kategori->nama }}</td>
                <td>
                    <a href="{{ route('kategori.show', $j->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('kategori.destroy', $j->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
  

      <h1>Add Kategori</h1>
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Kategori</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama kategori">
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