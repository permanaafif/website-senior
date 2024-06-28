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
                    <form action="{{ route('data-target.update', $targets->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label>Dosen</label>
                            <select name="dosen_id" class="form-control">
                                <option value="" selected>Pilih Dosen</option>
                                @foreach ($dosens as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $data->id == $targets->dosen_id ? 'selected' : '' }}>{{ $data->user->nama  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Minggu Ke</label>
                            <input type="text" name="minggu" class="form-control" placeholder="Masukan minggu ke"
                                value="{{ $targets->minggu }}">
                        </div>
                        <div class="mb-3">
                            <label>Kemampuan</label>
                            <input type="text" name="kemampuan" class="form-control" placeholder="Masukan Kemampuan"
                                value="{{ $targets->kemampuan }}" </div>
                            <div class="mb-3">
                                <label>Waktu</label>
                                <input type="text" name="waktu" class="form-control" placeholder="Masukan waktu"
                                    value="{{ $targets->waktu }}">
                            </div>
                            <div class="mb-3">
                                <label>Teknik</label>
                                <input type="text" name="teknik" class="form-control" placeholder="Masukan teknik"
                                    value="{{ $targets->teknik }}">
                            </div>
                            <div class="mb-3">
                                <label>Indikator</label>
                                <input type="text" name="indikator" class="form-control" placeholder="Masukan indikator"
                                    value="{{ $targets->indikator }}">
                            </div>
                            <div class="mb-3">
                                <label>Bobot</label>
                                <input type="text" name="bobot" class="form-control" placeholder="Masukan bobot"
                                    value="{{ $targets->bobot }}">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                                <a href="{{ route('data-target.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
