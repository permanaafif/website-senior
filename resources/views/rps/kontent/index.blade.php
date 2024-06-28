@extends('layouts.main')
@section('menu', 'active')
@section('container')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Data Konten
                </div>
                <div class="card-body">
                    <a href="{{ route('data-konten.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                        Tambah Data
                    </a>
                    <div class="d-flex justify-content-end mb-2"> <!-- Use d-flex and justify-content-end to move to the right -->
                        <a href="{{ route('data-capaian.index') }}" class="btn btn-primary btn-sm mr-2">
                            <i class=""></i>
                            Back
                        </a>
                    </div>
                    <div class="table-responsive my-3">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Dosen</th>
                                    <th>Judul</th>
                                    <th>SubJudul</th>
                                    <th>Konten</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kontens as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->dosen->user->nama  ?? '-' }}</td>
                                        <td>{{ $data->judul->nama_judul ?? '-' }}</td>
                                        <td>{{ $data->subjudul->nama_subjudul ?? '-' }}</td>
                                        <td>{{ $data->isi_konten ?? '-' }}</td>
                                        <td>
                                            <form action="{{ route('data-konten.destroy', $data->id) }}" method="POST"
                                                class="d-flex">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('data-konten.edit', $data->id) }}"
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
