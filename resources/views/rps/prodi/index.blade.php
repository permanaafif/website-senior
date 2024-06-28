@extends('layouts.main')
@section('menu', 'active')
@section('container')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Data Program Studi
                </div>
                <div class="card-body">
                    <a href="{{ route('data-prodi.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                        Tambah Data
                    </a>
                    <div class="table-responsive my-3">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Jurusan</th>
                                    <th>Program Studi</th>
                                    <th>Ketua Program Studi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prodis as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->jurusan->nama_jurusan ?? '-' }}</td>
                                        <td>{{ $data->nama_prodi ?? '-' }}</td>
                                        <td>{{ $data->nama_kaprodi ?? '-' }}</td>
                                        <td>
                                            <form action="{{ route('data-prodi.destroy', $data->id) }}" method="POST"
                                                class="d-flex">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('data-prodi.edit', $data->id) }}"
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
