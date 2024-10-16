@extends('layout.app')
@section('content')
    @if (session()->has('message'))
        <p class="alert alert-info">{{ session('message') }}</p>
    @endif
    <div class="card mb-3">
        <div class="card-header">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <div class="input-group">
                            <input class="form-control me-2" name="q" value="{{ $q }}" type="search"
                                placeholder="Pencarian..." aria-label="Search">
                            <button class="btn me-2 btn-outline-success" type="submit">
                                Search <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                    @if (Auth::user()->level == 'Admin')
                        <div class="col">
                            <a class="btn btn-primary" href="{{ route('kategori.create') }}">
                                Tambah <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    @endif
                    <div class="col">
                        <a class="btn btn-primary" href="{{ route('kategori.kategoriexport') }}">
                            Export Excel<i class="fa-solid fa-file-excel" style="margin-left: 5px;"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        @if (Auth::user()->level == 'Admin')
                            <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <?php $no = 1;
                ?>
                @foreach ($kategoris as $kategori)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                        @if (Auth::user()->level == 'Admin')
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('kategori.edit', $kategori) }}">
                                    Ubah <i class="fa-solid fa-pen-to-square" style="margin-left: 5px;"></i>
                                </a>
                                <form method="POST" class="d-inline" action="{{ route('kategori.destroy', $kategori) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Hapus data?')">
                                        Hapus <i class="fa-solid fa-trash" style="margin-left: 5px;"></i>
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
        @if ($kategoris->hasPages())
            <div class="card-footer">
                {{ $kategoris->links() }}
            </div>
        @endif
    </div>
@endsection
