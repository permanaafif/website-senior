@extends('layouts.main')
@section('menu', 'active')
@section('container')

@if (session()->has('pesan'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-check"></i> {{ session('pesan') }}
    </div>
@endif



<div class="row mt-4">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">Uas</h5>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Uas</th>
                                {{-- <th>kuis</th>
                                <th>uts</th>
                                <th>uas</th>
                                <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                           <h6>Rata-Rata Uas : {{ $rata_rata['uas'] }}<br></h6>
                           {{-- <h6>Rata-Rata Kuis : {{ $rata_rata['kuis'] }}<br></h6>
                           <h6>Rata-Rata UTS : {{ $rata_rata['uts'] }}<br></h6>
                           <h6>Rata-Rata UAS : {{ $rata_rata['uas'] }}<br></h6> --}}

                           @foreach ($all_nilai_uas as $item)
                           <tr id="items">
                               <td class="text-center">{{ $loop->iteration}}</td>
                               <td>{{ $item->mahasiswa->nama }}</td>
                               <td><a href="" class="editable" data-type="text" data-name="uas" data-pk="{{ $item->id }}">{{ $item->uas }}</td>
                               <td class="text-center">
                               <form action="/nilaiuas//hapusuas/{{ $item->id }}" method="post" class="d-inline">
                                   @method('DELETE')
                                   @csrf
                                   <button type="submit" class= "btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data')"><i class="fas fa-trash"></i> Delete</button>
                               </form>

                       {{-- <button type="button" id="id_mahasiswa" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" data-value="{{ $item->mahasiswa->id }}">
                       Tambah
                       </button> --}}

                       </td>
                       </tr>

                           @endforeach
                        </tbody>
                    </table>

                                        <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <label for="validationCustom01">uas</label>
            <form id="form_create_nilai_uas">
                <input type="hidden" name="mahasiswa_id" id="mahasiswa_id" value="{{ $id }}">
                <input type="hidden" name="matakuliah_id" id="matakuliah_id" value="{{ $_GET['matakuliah'] }}">
                <input type="number"  class="form-control  @error('uas') is-invalid @enderror" value="{{old('uas')}}" name="uas" id="uas" >
                @error('uas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
      </div>
    </div>
  </div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Tambah Uas
  </button>
                </div>
            </div>

            <!-- Use the correct variable for pagination -->
            <div  class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-2 px-4">
                @if (isset($kelas_mahasiswas ) && $kelas_mahasiswas  instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $kelas_mahasiswas ->links('pagination::bootstrap-5') }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection






