@extends('layout.app')
@section('content')
    @if (session()->has('message'))
        <p class="alert alert-info">{{ session('message') }}</p>
    @endif
    @if (Auth::user()->level == 'Admin')
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
                            <a class="btn btn-primary" href="{{ route('user.create') }}">
                                Tambah <i class="fa-solid fa-plus"></i>
                            </a>
                            <a class="btn btn-primary" href="{{ route('user.userexport') }}">
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
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Telp</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php //$no = 1;
                    ?>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->nama_user }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->telp }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->level }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('user.edit', $user) }}">
                                    Ubah <i class="fa-solid fa-pen-to-square" style="margin-left: 5px;"></i>
                                </a>
                                <form method="POST" class="d-inline" action="{{ route('user.destroy', $user) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Hapus data?')">
                                        Hapus <i class="fa-solid fa-trash" style="margin-left: 5px;"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endif
@endsection
