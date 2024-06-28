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
                    <form action="{{ route('data-konten.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Dosen</label>
                            <select name="dosen_id" class="form-control">
                                <option value="" selected>Pilih Dosen</option>
                                @foreach ($dosens as $data)
                                    <option value="{{ $data->id }}">{{ $data->user->nama  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Judul</label>
                            <select name="judul_id" class="form-control">
                                <option value="" selected>Pilih Judul</option>
                                @foreach ($juduls as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>SubJudul</label>
                            <select name="subjudul_id" class="form-control">
                                <option value="" selected>Pilih Subjudul</option>
                                @foreach ($subjuduls as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_subjudul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Nama Subjudul</label>
                            <textarea name="isi_konten" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="{{ route('data-konten.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
