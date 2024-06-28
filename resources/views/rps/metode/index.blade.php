@extends('layouts.main')
@section('menu', 'active')
@section('container')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Data Metode
                </div>
                <div class="card-body">
                    <a href="{{ route('data-metode.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                        Tambah Data
                    </a>
                    <div class="d-flex justify-content-end mb-2"> <!-- Use d-flex and justify-content-end to move to the right -->
                        <a href="{{ route('data-kajian.index') }}" class="btn btn-primary btn-sm mr-2">
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
                                    <th>Minggu ke</th>
                                    <th>Bentuk</th>
                                    <th>Kondisi</th>
                                    <th>Pengalaman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metodes as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->dosen->user->nama  ?? '-' }}</td>
                                        <td>{{ $data->target->minggu ?? '-' }}</td>
                                        <td>{{ $data->bentuk_metode ?? '-' }}</td>
                                        <td>{{ $data->kondisi_metode ?? '-' }}</td>
                                        <td>{{ $data->pengalaman_metode ?? '-' }}</td>
                                        <td>
                                            <form action="{{ route('data-metode.destroy', $data->id) }}" method="POST"
                                                class="d-flex">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('data-metode.edit', $data->id) }}"
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
