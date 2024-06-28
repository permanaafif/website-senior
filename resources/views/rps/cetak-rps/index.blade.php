@extends('layouts.main')
@section('menu', 'active')
@section('container')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Data RPS
                </div>
                <div class="card-body">
                    <div class="table-responsive my-3">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Dosen</th>
                                    <th>Matkul</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dosens as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->user->nama  ?? '-' }}</td>
                                        <td>{{ $data->matakuliah->matkul ?? '-' }}</td>
                                        <td>{{ $data->judul->nama_judul ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('data-rps.show', $data->id) }}"
                                                class="btn btn-sm btn-primary mx-2" target="_blank">
                                                <i class="fas fa-print"></i>
                                                Cetak RPS
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
