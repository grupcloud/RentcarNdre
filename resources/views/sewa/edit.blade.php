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

            <form method="POST" action="{{ route('sewa.update', $sewa) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Tanggal Sewa</label>
                    <input class="form-control" type="date" name="tanggal_sewa"
                        value="{{ old('tanggal_sewa', $sewa->tanggal_sewa) }}" />
                </div>

                <div class="mb-3">
                    <label>Tanggal Kembali</label>
                    <input class="form-control" type="date" name="tanggal_kembali"
                        value="{{ old('tanggal_kembali', $sewa->tanggal_kembali) }}" />
                </div>

                <div class="mb-3">
                    <label>Status Sewa</label>
                    <select class="form-select" name="status_sewa">
                        <option value="Disewa" {{ old('status_sewa', $sewa->status_sewa) == 'Disewa' ? 'selected' : '' }}>
                            Disewa</option>
                        <option value="Di Kembalikan"
                            {{ old('status_sewa', $sewa->status_sewa) == 'Di Kembalikan' ? 'selected' : '' }}>
                            Di Kembalikan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <button class="btn btn-success">Simpan<i class="fa-solid fa-floppy-disk"
                            style="margin-left: 5px;"></i></button>
                    <a class="btn btn-danger" href="{{ route('sewa.index') }}">Kembali<i
                            class="fa-solid fa-share-from-square" style="margin-left: 5px;"></i></a>
                </div>
            </form>
        </div>
    </div>
@endsection
