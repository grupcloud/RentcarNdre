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
                    <div class="col">
                        <a class="btn btn-primary" href="{{ route('sewa.create') }}">
                            Tambah <i class="fa-solid fa-plus" style="margin-left: 5px;"></i>
                        </a>
                    </div>
                    <nav class="navbar bg-body-tertiary">
                        <div class="col">
                            <a class="btn btn-primary" href="{{ route('sewa.sewaexport') }}">
                                Export Excel<i class="fa-solid fa-file-excel" style="margin-left: 5px;"></i>
                            </a>
                            <a href="{{ route('sewa.index', ['sort' => 'total_asc']) }}" class="btn btn-primary">
                                Total Rendah ke Tinggi<i class="fa-solid fa-caret-down" style="margin-left: 5px;"></i>
                            </a>
                            <a href="{{ route('sewa.index', ['sort' => 'total_desc']) }}" class="btn btn-primary">
                                Total Tinggi ke Rendah<i class="fa-solid fa-caret-up" style="margin-left: 5px;"></i>
                            </a>
                        </div>
                    </nav>
                </div>
            </nav>
        </div>
    </div>

    <div class="tcontainer mt-0 table-container">
        <table class="table table-hover table-bordered table-striped m-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mobil</th>
                    <th>Plat Mobil</th>
                    <th>Harga Sewa</th>
                    <th>Lama Sewa</th>
                    <th>Total</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Nama User</th>
                    <th>Status Sewa</th>
                    <th>Telp</th>
                    <th>Email</th>
                    @if (Auth::user()->level == 'Admin')
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <?php //$no = 1;
                ?>
                @foreach ($sewas as $sewa)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $sewa->nama_mobil }}</td>
                        <td>{{ $sewa->plat_mobil }}</td>
                        <td>Rp {{ number_format($sewa->harga_sewa, 0, ',', '.') }}</td>
                        <td>{{ $sewa->lama_sewa }}</td>
                        <td>Rp {{ number_format($sewa->total, 0, ',', '.') }}</td>
                        <td>{{ $sewa->tanggal_sewa }}</td>
                        <td>{{ $sewa->tanggal_kembali }}</td>
                        <td>{{ $sewa->nama_user }}</td>
                        <td>{{ $sewa->status_sewa }}</td>
                        <td>{{ $sewa->telp }}</td>
                        <td>{{ $sewa->email }}</td>
                        @if (Auth::user()->level == 'Admin')
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('sewa.edit', $sewa) }}">
                                    Ubah <i class="fa-solid fa-pen-to-square" style="margin-left: 5px;"></i>
                                </a>
                                <form method="POST" class="d-inline" action="{{ route('sewa.destroy', $sewa) }}">
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
            </tbody>
        </table>
        @if ($sewas->hasPages())
            <div class="card-footer">
                {{ $sewas->links() }}
            </div>
        @endif
    </div>
@endsection
