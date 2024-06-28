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
                    <form action="{{ route('data-jurusan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Nama Jurusan</label>
                            <input type="text" name="nama_jurusan" class="form-control" placeholder="Masukan nama jurusan">
                        </div>
                        <div class="mb-3">
                            <label>Nama Ketua Jurusan</label>
                            <input type="text" name="nama_kajur" class="form-control" placeholder="Masukan nama jurusan">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="{{ route('data-jurusan.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
