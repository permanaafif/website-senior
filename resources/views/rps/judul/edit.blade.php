@extends('layouts.main')
@section('menu', 'active')
@section('container')

    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Edit Data
                </div>
                <div class="card-body">
                    <form action="{{ route('data-judul.update', $juduls->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label>Dosen</label>
                            <select name="dosen_id" class="form-control">
                                <option value="" selected>Pilih Dosen</option>
                                @foreach ($dosens as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $data->id == $juduls->dosen_id ? 'selected' : '' }}>{{ $data->user->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Nama Judul</label>
                            <input type="text" name="nama_judul" class="form-control" placeholder="Masukan nama judul"
                                value="{{ $juduls->nama_judul }}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="{{ route('data-judul.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
