@extends('layouts.main')
@section('menu', 'active')
@section('container')

    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Tambahkan Data
                </div>
                <div class="card-body">
                    <form action="{{ route('data-prodi.update', $prodis->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label>Nama Jurusan</label>
                            <select name="jurusan_id" class="form-control">
                                <option value="" selected>Pilih Jurusan</option>
                                @foreach ($jurusans as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $data->id == $prodis->jurusan_id ? 'selected' : '' }}>
                                        {{ $data->nama_jurusan ?? '-' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Nama Program Studi</label>
                            <input type="text" name="nama_prodi" class="form-control" value="{{ $prodis->nama_prodi }}"
                                placeholder="Masukan nama prodi">
                        </div>
                        <div class="mb-3">
                            <label>Nama Ketua Prodi</label>
                            <input type="text" name="nama_kaprodi" class="form-control" value="{{ $prodis->nama_kaprodi }}"
                                placeholder="Masukan nama ketua prodi">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="{{ route('data-prodi.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
