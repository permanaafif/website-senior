@extends('layouts.main')
@section('menu', 'active')
@section('container')

    @if (session()->has('pesan'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-check"></i> {{ session('pesan') }}
        </div>
    @endif
    <a href="/dosen/create" class="btn btn-sm btn-primary"><i class="fas fa-arrow-down"></i> Insert</a>
    <div class="row mt-4">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header ">DOSEN</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>    
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nip</th>
                                    <th>Jenis_Kelamin</th>
                                    <th>Tanggal_Lahir</th>
                                    <th>Alamat</th>
                                    <th>nomor_telepon</th>
                                    <th>email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dosens as $dosen)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $dosen->user->nama }}</td>
                                        <td>{{ $dosen->nip }}</td>
                                        <td>{{ $dosen->jenis_kelamin }}</td>
                                        <td>{{ $dosen->tanggal_lahir }}</td>
                                        <td>{{ $dosen->alamat }}</td>
                                        <td>{{ $dosen->nomor_telepon }}</td>
                                        <td>{{ $dosen->email }}</td>
                                        <td class="text-center">
                                            <a href="/dosen/{{ $dosen->id }}/edit" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-pencil-alt"></i> Update</a>

                                            <form action="/dosen/{{ $dosen->id }}" method="post" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin akan menghapus data')"><i
                                                        class="fas fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Use the correct variable for pagination -->
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-2 px-4">
                    @if (isset($dosens) && $dosens instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{ $dosens->links('pagination::bootstrap-5') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
