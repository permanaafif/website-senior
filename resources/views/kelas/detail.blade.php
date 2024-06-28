

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


            <!-- Add the search form -->
            <form action="{{ route('kelas.search') }}"method="get" class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-4 px-4">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search by kelas">
                    <div class="input-group-append px-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>

            </form>

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

                                                    <form id="form_create_bobot">
                                                    {{-- <input type="hidden" name="mahasiswa_id" id="mahasiswa_id" value="{{ $id }}"> --}}

                                                    {{-- <label for="validationCustom01">Mata Kuliah</label> --}}
                                                    <input type="hidden"  class="form-control  @error('mata_kuliah_id') is-invalid @enderror" value="{{ app('request')->input('matakuliah') }}" name="mata_kuliah_id" id="mata_kuliah_id" >
                                                    @error('mata_kuliah_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror

                                                    <label for="validationCustom01">Bobot Tugas</label>
                                                        <input type="number"  class="form-control  @error('bobot_tugas') is-invalid @enderror" value="{{old('bobot_tugas')}}" name="bobot_tugas" id="bobot_tugas" >
                                                        @error('bobot_tugas')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    <label for="validationCustom01">Bobot Kuis</label>

                                                        <input type="number"  class="form-control  @error('bobot_kuis') is-invalid @enderror" value="{{old('bobot_kuis')}}" name="bobot_kuis" id="bobot_kuis" >
                                                        @error('bobot_kuis')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    <label for="validationCustom01">Bobot Uts</label>

                                                        <input type="number"  class="form-control  @error('bobot_uts') is-invalid @enderror" value="{{old('bobot_uts')}}" name="bobot_uts" id="bobot_uts" >
                                                        @error('bobot_uts')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    <label for="validationCustom01">Bobot Uas</label>

                                                        <input type="number"  class="form-control  @error('bobot_uas') is-invalid @enderror" value="{{old('bobot_uas')}}" name="bobot_uas" id="bobot_uas" >
                                                        @error('bobot_uas')
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                    Tambah Bobot
                  </button>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">

                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama mahasiswa</th>
                                {{-- <th>Matakuliah</th>     --}}
                                <th>Tugas</th>
                                <th>Kuis</th>
                                <th>Uts</th>
                                <th>Uas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                            <tr>

                                <td class="text-center">{{ $loop->iteration}}</td>
                                <td>{{ $mahasiswa->nama}}</td>
                                {{-- <td>{{ $mahasiswa->matakuliah->matkul}}</td> --}}
                                {{-- @php
                                    dd($mahasiswa);
                                @endphp --}}

                                <td class="text-center">

                                    <a href="{{ route('mahasiswa.show', ['id' => $mahasiswa->id, 'matakuliah' => $mahasiswa->matakuliah->id]) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-info-circle"></i> Detail
                                    </a>
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('mahasiswak.show',  ['id' => $mahasiswa->id, 'matakuliah' => $mahasiswa->matakuliah->id]) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-info-circle"></i> Detail
                                    </a>
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('mahasiswauts.show', ['id' => $mahasiswa->id, 'matakuliah' => $mahasiswa->matakuliah->id]) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-info-circle"></i> Detail
                                    </a>
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('mahasiswauas.show', ['id' => $mahasiswa->id, 'matakuliah' => $mahasiswa->matakuliah->id]) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-info-circle"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                    <div  class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-2 px-4">
                        @if (isset($mahasiswas) && $mahasiswas instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{ $mahasiswas->links('pagination::bootstrap-5') }}
                        @endif
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                        <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-edit"> Update</i></button>
                        <a href="/matakuliah" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                    </div>

                    {{-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                          </li>
                        </ul>
                      </nav> --}}

                </div>
            </div>
        </div>
    </div>
</div><br>

<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#ratarata"> Click Rata-Rata</button>
<div id="ratarata" class="collapse">
<div class="row mt-4">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Mahasiswa</th>
                                <th>Rata-Rata Tugas</th>
                                <th>Rata-Rata Kuis</th>
                                <th>Rata-Rata Uts</th>
                                <th>Rata-Rata Uas</th>
                                {{-- <th>kuis</th>
                                <th>uts</th>
                                <th>uas</th>
                                <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                           {{-- <h6>Rata-Rata Tugas : {{ $rata_rata['uas'] }}<br></h6> --}}
                           {{-- <h6>Rata-Rata Kuis : {{ $rata_rata['kuis'] }}<br></h6>
                           <h6>Rata-Rata UTS : {{ $rata_rata['uts'] }}<br></h6>
                           <h6>Rata-Rata UAS : {{ $rata_rata['uas'] }}<br></h6> --}}
{{--
                           @foreach ($nilaiakhirs as $item)
                           <tr id="items">
                               <td class="text-center">{{ $loop->iteration}}</td>
                               <td>{{ $item->mahasiswa->nama }}</td>
                               <td><a href="" class="editable" data-type="text" data-name="uas" data-pk="{{ $item->id }}">{{ $item->uas }}</td>
                               <td class="text-center">
                               <form action="/nilaitugas/{{ $item->id }}" method="post" class="d-inline">
                                   @method('DELETE')
                                   @csrf
                                   <button type="submit" class= "btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data')"><i class="fas fa-trash"></i> Delete</button>
                               </form>

                       <button type="button" id="id_mahasiswa" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" data-value="{{ $item->mahasiswa->id }}">
                       Tambah
                       </button>

                       </td>
                       </tr>

                           @endforeach --}}
                           @foreach ($mahasiswas_rata as $nilai)
                           <tr>
                            {{-- @dd($nilai); --}}
                               <td class="text-center">{{ $loop->iteration}}</td>
                               <td>{{ $nilai->nama}}</td>
                               {{-- <td>{{ $nilai->sikap}}</td> --}}

                               @foreach ($nilai->nilairata as $nilairata)
                                    <td>{{ round($nilairata->tugas)}}</td>
                                    <td>{{ round($nilairata->kuis)}}</td>
                                    <td>{{ round($nilairata->uts)}}</td>
                                    <td>{{ round($nilairata->uas)}}</td>
                               @endforeach

                               {{-- <td class="text-center">
                                   <a href="/nilairata/{{ $nilai->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Update</a>

                                   <form action="/nilairata/{{ $nilai->id }}" method="post" class="d-inline">
                                       @method('DELETE')
                                       @csrf
                                       <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data')"><i class="fas fa-trash"></i> Delete</button>
                                   </form>
                                   <a href="{{ route('kelas.show', $nilai->id) }}" class="btn btn-info btn-sm">
                                       <i class="fas fa-info-circle"></i> Detail
                                   </a>
                               </td> --}}
                           </tr>
                           @endforeach
                        </tbody>
                    </table>


  </div>


                </div>
        </div>
    </div>
</div>
</div>





@endsection


