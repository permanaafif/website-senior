@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM Kelas</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/nilaimahasiswa" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="validationCustom01">Mahasiswa </label>
                            <select  class="form-control  @error('mahasiswa_id') is-invalid @enderror" value="{{old('mahasiswa_id')}}" name="mahasiswa_id" required>
                                @foreach ($mahasiswas as $mahasiswa )
                                <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }}</option>
                                @endforeach
                            </select>
                            @error('mahasiswa_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="validationCustom01">Nilai Bobot </label>
                            <select  class="form-control  @error('nilai_bobot_id') is-invalid @enderror" value="{{old('nilai_bobot_id')}}" name="nilai_bobot_id" required>
                                @foreach ($nilai_bobots as $nilai_bobot )
                                <option value="{{ $nilai_bobot->id }}">{{ $nilai_bobot->matakuliah->matkul }}</option>
                                @endforeach
                            </select>
                            @error('nilai_bobot_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror



                            <label for="validationCustom01">Sikap</label>
                            <input type="number" class="form-control  @error('sikap') is-invalid @enderror" value="{{old('sikap')}}" name="sikap" required>
                            @error('sikap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="validationCustom01">Tugas</label>
                            <input type="number" class="form-control  @error('tugas') is-invalid @enderror" value="{{old('tugas')}}" name="tugas" required>
                            @error('tugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="validationCustom01">Kompetensi</label>
                            <input type="number" class="form-control  @error('kompetensi') is-invalid @enderror" value="{{old('kompetensi')}}" name="kompetensi" required>
                            @error('kompetensi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror







                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/nilaimahasiswa" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
