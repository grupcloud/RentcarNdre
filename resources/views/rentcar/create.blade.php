@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-info">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('rentcar.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Nama Mobil</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="nama_mobil" value="{{ old('nama_mobil') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <select class="form-select" name="id_kategori">
                        @foreach ($kategoris as $kategori)
                            @if (old('id_kategori') == $kategori->id_kategori)
                                <option value="{{ $kategori->id_kategori }}" selected> {{ $kategori->nama_kategori }}
                                </option>
                            @else
                                <option value="{{ $kategori->id_kategori }}"> {{ $kategori->nama_kategori }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Plat Mobil</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="plat_mobil" value="{{ old('plat_mobil') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label>Harga Sewa</label>
                    <div class="input-group">
                        <input class="form-control" type="number" name="harga_sewa" id="harga_sewa"
                            value="{{ old('harga_sewa') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label>Gambar</label>
                    <input class="form-control" type="file" name="gambar">
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Simpan<i class="fa-solid fa-floppy-disk"
                            style="margin-left: 5px;"></i></button>
                    <a class="btn btn-danger" href="{{ route('rentcar.index') }}">Kembali<i
                            class="fa-solid fa-share-from-square" style="margin-left: 5px;"></i></a>

            </form>
        </div>
    </div>
@endsection
