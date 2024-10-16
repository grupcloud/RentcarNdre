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
                            <a class="btn btn-primary" href="{{ route('rentcar.create') }}">
                                Tambah <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    @endif
                    <nav class="navbar bg-body-tertiary">
                        <div class="col">
                            <a class="btn btn-primary" href="{{ route('rentcar.rentcarexport') }}">
                                Export Excel<i class="fa-solid fa-file-excel" style="margin-left: 5px;"></i>
                            </a>
                            <a href="{{ route('rentcar.index', ['sort' => 'harga_asc']) }}" class="btn btn-primary">
                                Harga Rendah ke Tinggi<i class="fa-solid fa-caret-down" style="margin-left: 5px;"></i>
                            </a>
                            <a href="{{ route('rentcar.index', ['sort' => 'harga_desc']) }}" class="btn btn-primary">
                                Harga Tinggi ke Rendah<i class="fa-solid fa-caret-up" style="margin-left: 5px;"></i>
                            </a>
                        </div>
                    </nav>
                </div>
            </nav>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Plat Mobil</th>
                        <th>Harga Sewa</th>
                        <th>Gambar</th>
                        @if (Auth::user()->level == 'Admin')
                            <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <?php //$no = 1;
                ?>
                @foreach ($rentcars as $rentcar)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $rentcar->nama_mobil }}</td>
                        <td>{{ $rentcar->nama_kategori }}</td>
                        <td>{{ $rentcar->plat_mobil }}</td>
                        <td>{{ $rentcar->harga_sewa }}</td>
                        <td>
                            <img src="{{ $rentcar->getImage() }}" height="100">
                        </td>
                        @if (Auth::user()->level == 'Admin')
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('rentcar.edit', $rentcar) }}">
                                    Ubah <i class="fa-solid fa-pen-to-square" style="margin-left: 5px;"></i>
                                </a>
                                <form method="POST" class="d-inline" action="{{ route('rentcar.destroy', $rentcar) }}">
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

        @if ($rentcars->hasPages())
            <div class="card-footer">
                {{ $rentcars->links() }}
            </div>
        @endif
    </div>
@endsection
