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
            <form method="POST" action="{{ route('rentcar.update', $rentcar) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label>Kategori</label>
                    <select class="form-select" name="id_kategori">
                        @foreach ($kategoris as $kategori)
                            @if (old('id_kategori', $rentcar->id_kategori) == $kategori->id_kategori)
                                <option value="{{ $kategori->id_kategori }}" selected> {{ $kategori->nama_kategori }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Nama Mobil</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="nama_mobil"
                            value="{{ old('nama_mobil', $rentcar->nama_mobil) }}" />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="plat_mobil">Plat Mobil</label>
                    <div class="input-group">
                        <input id="plat_mobil" class="form-control" type="text" name="plat_mobil"
                            value="{{ old('plat_mobil', $rentcar->plat_mobil) }}" />
                    </div>
                </div>

                <div class="mb-3">
                    <label>Harga Sewa</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="harga_sewa"
                            value="{{ old('harga_sewa', $rentcar->harga_sewa) }}" id="harga_sewa_input" />
                    </div>
                </div>

                <div class="mb-3">
                    <label>Gambar</label>
                    <input class="form-control" type="file" name="gambar" />
                    <P class="form-text">Kosongkan jika tidak ingin mengubah gambar!</P>
                    <img src="{{ $rentcar->getImage() }}" height="100">
                </div>

                <div class="mb-3">
                    <button class="btn btn-success">Simpan<i class="fa-solid fa-floppy-disk"
                            style="margin-left: 5px;"></i></button>
                    <a class="btn btn-danger" href="{{ route('rentcar.index') }}">Kembali<i
                            class="fa-solid fa-share-from-square" style="margin-left: 5px;"></i></a>
                </div>
            </form>
        </div>
    </div>
@endsection
