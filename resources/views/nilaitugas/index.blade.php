@extends('layouts.main')
@section('menu', 'active')
@section('container')

@if (session()->has('pesan'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-check"></i> {{ session('pesan') }}
    </div>
@endif
<a href="/nilaitugas/create" class="btn btn-sm btn-primary"><i class="fas fa-arrow-down"></i> Insert</a>
<div class="row mt-4">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">SKS</h5>

            <!-- Add the search form -->
            {{-- <form action="{{ route('mahasiswa.search') }}"method="get" class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-4 px-4">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search by name">
                    <div class="input-group-append px-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form> --}}

            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-striped table-bordered first">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>Tugas</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($nilais as $item)
                            <tr id="items">
                                <td class="text-center">{{ $loop->iteration}}</td>
                                <td>{{ $item->mahasiswa->nama }}</td>
                                <td><a href="" class="editable" data-type="text" data-name="tugas" data-pk="{{ $item->id }}">{{ $item->tugas }}</td>
                                <td class="text-center">
                                <form action="/nilaitugas/{{ $item->id }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data')"><i class="fas fa-trash"></i> Delete</button>
                                </form>

                        <button type="button" id="id_mahasiswa" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" data-value="{{ $item->mahasiswa->id }}">
                        Tambah
                        </button>

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
            {{-- <label for="validationCustom01">Mahasiswa </label>
            <select  class="form-control  @error('mahasiswa_id') is-invalid @enderror" value="{{old('mahasiswa_id')}}" name="mahasiswa_id" required>
                @foreach ($mahasiswas as $mhs)
                <option value="{{ $mhs->id }}">{{ $mhs->nama }}</option>
              @endforeach
            </select>
            @error('mahasiswa_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror --}}
            <label for="validationCustom01">Tugas</label>
            <form id="form_create_nilai">
                <input type="number"  class="form-control  @error('tugas') is-invalid @enderror" value="{{old('tugas')}}" name="tugas" >
                @error('tugas')
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
    Launch demo modal
  </button>
                    {{-- <button id="mybtn">Tambah nilai</button> --}}
                    {{-- <td>
                        {{ number_format($rataRataTugas[$mahasiswas->id], 2) }}
                    </td> --}}
                    {{-- <h4 >Rata-rata Nilai Tugas:</h4>
                    <p>{{ $rataRataTugas }}</p>
                    <h4>Rata-rata Nilai Kuis:</h4>
                    <p>{{ $rataRataKuis }}</p>
                    <h4>Rata-rata Nilai UTS:</h4>
                    <p>{{ $rataRataUts }}</p>
                    <h4>Rata-rata Nilai UAS:</h4>
                    <p>{{ $rataRataUas }}</p> --}}
                    {{-- @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>
                            @if ($rataRataTugas->has($mahasiswa->id))
                                {{ number_format($rataRataTugas[$mahasiswa->id], 2) }},
                            @else
                                Data tidak tersedia
                            @endif
                            @if ($rataRataKuis->has($mahasiswa->id))
                                {{ number_format($rataRataKuis[$mahasiswa->id], 2) }}
                            @else
                             Data tidak tersedia
                            @endif
                            @if ($rataRataUts->has($mahasiswa->id))
                                {{ number_format($rataRataUts[$mahasiswa->id], 2) }}
                            @else
                                Data tidak tersedia
                            @endif
                              @if ($rataRataUas->has($mahasiswa->id))
                                {{ number_format($rataRataUas[$mahasiswa->id], 2) }} <br>
                            @else
                                Data tidak tersedia
                            @endif

                        </td>



                    </tr>
                @endforeach --}}
                </div>
            </div>

            <!-- Use the correct variable for pagination -->
            <div  class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-2 px-4">
                @if (isset($nilais) && $nilais instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $nilais->links('pagination::bootstrap-5') }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
