@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM Kelas</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/nilaitugas" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="validationCustom01">Mahasiswa </label>
                            <select  class="form-control  @error('mahasiswa_id') is-invalid @enderror" value="{{old('mahasiswa_id')}}" name="mahasiswa_id" required>
                                @foreach ($mahasiswas as $mhs)
                                <option value="{{ $mhs->id }}">{{ $mhs->nama }}</option>
                              @endforeach
                            </select>
                            @error('mahasiswa_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror





                            <label for="validationCustom01">Tugas</label>
                            <input type="number" class="form-control  @error('tugas') is-invalid @enderror" value="{{old('tugas')}}" name="tugas" >
                            @error('tugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            {{-- <label for="validationCustom01">Kuis</label>
                            <input type="number" class="form-control  @error('kuis') is-invalid @enderror" value="{{old('kuis')}}" name="kuis" >
                            @error('kuis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="validationCustom01">UTS</label>
                            <input type="number" class="form-control  @error('uts') is-invalid @enderror" value="{{old('uts')}}" name="uts" >
                            @error('uts')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="validationCustom01">UAS</label>
                            <input type="number" class="form-control" value="{{old('uas')}}"  name="uas" > --}}








                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/nilaitugas" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
