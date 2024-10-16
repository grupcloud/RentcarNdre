@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('kategori.update', $kategori) }}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label>Nama Kategori</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="nama_kategori"
                            value="{{ old('nama_kategori', $kategori->nama_kategori) }}" />
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Simpan<i class="fa-solid fa-floppy-disk"
                            style="margin-left: 5px;"></i></button>
                    <a class="btn btn-danger" href="{{ route('kategori.index') }}">Kembali<i
                            class="fa-solid fa-share-from-square" style="margin-left: 5px;"></i></a>
                </div>
            </form>
        </div>
    </div>
@endsection
