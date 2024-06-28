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
                    <form action="{{ route('data-metode.store') }}" method="POST">
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
                            <label>Minggu</label>
                            <select name="target_id" class="form-control">
                                <option value="" selected>Pilih Minggu</option>
                                @foreach ($targets as $data)
                                    <option value="{{ $data->id }}">{{ $data->minggu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Bentuk Metode</label>
                            <input type="text" name="bentuk_metode" class="form-control"
                                placeholder="Masukan nama bentuk metode">
                        </div>
                        <div class="mb-3">
                            <label>Kondisi Metode</label>
                            <input type="text" name="kondisi_metode" class="form-control"
                                placeholder="Masukan nama kondisi metode">
                        </div>
                        <div class="mb-3">
                            <label>Pengalaman Metode</label>
                            <input type="text" name="pengalaman_metode" class="form-control"
                                placeholder="Masukan nama pengalaman metode">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="{{ route('data-metode.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
