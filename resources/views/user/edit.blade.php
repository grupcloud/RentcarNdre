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
            <form method="POST" action="{{ route('user.update', $user) }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label>Nama User</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="nama_user"
                            value="{{ old('nama_user', $user->nama_user) }}" />
                    </div>
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="username"
                            value="{{ old('username', $user->username) }}" />
                    </div>
                </div>

                <div class="mb-3">
                    <label>Passowrd</label>
                    <div class="input-group">
                        <input class="form-control" type="password" name="password" />
                        <p class="form-text">Kosongkan jika tidak ingin mengubah password!</p>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Telpon</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="telp" value="{{ old('telp', $user->telp) }}" />
                    </div>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="email"
                            value="{{ old('email', $user->email) }}" />
                    </div>
                </div>

                <div class="mb-3">
                    <label>Level</label>
                    <select class="form-select" name="level">
                        @foreach ($levels as $level)
                            @if (old('level', $user->level) == $level)
                                <option value="{{ $level }}" selected> {{ $level }}
                                </option>
                            @else
                                <option value="{{ $level }}">{{ $level }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <button class="btn btn-success">Simpan<i class="fa-solid fa-floppy-disk"
                            style="margin-left: 5px;"></i></button>
                    <a class="btn btn-danger" href="{{ route('user.index') }}">Kembali<i
                            class="fa-solid fa-share-from-square" style="margin-left: 5px;"></i></a>

            </form>
        </div>
    </div>
@endsection
