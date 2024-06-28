@extends('layouts.main')
@section('menu', 'active')
@section('container')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Data Target Pencapaian
                </div>
                <div class="card-body">
                    <a href="{{ route('data-target.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                        Tambah Data
                    </a>
                    <div class="d-flex justify-content-end mb-2"> <!-- Use d-flex and justify-content-end to move to the right -->
                        <a href="{{ route('data-kajian.index') }}" class="btn btn-primary btn-sm">
                            <i class=""></i>
                            Next
                        </a>
                    </div>
                    <div class="table-responsive my-3">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Dosen</th>
                                    <th>Minggu</th>
                                    <th>Waktu</th>
                                    <th>Teknik</th>
                                    <th>Indikator</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($targets as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->dosen->user->nama  ?? '-' }}</td>
                                        <td>{{ $data->minggu ?? '-' }}</td>
                                        <td>{{ $data->waktu ?? '-' }}</td>
                                        <td>{{ $data->teknik ?? '-' }}</td>
                                        <td>{{ $data->indikator ?? '-' }}</td>
                                        <td>{{ $data->bobot ?? '-' }}</td>
                                        <td>
                                            <form action="{{ route('data-target.destroy', $data->id) }}" method="POST"
                                                class="d-flex">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('data-target.edit', $data->id) }}"
                                                    class="btn btn-sm btn-primary mx-2">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
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
