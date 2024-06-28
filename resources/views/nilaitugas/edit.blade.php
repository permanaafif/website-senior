@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">EDIT Mahasiswa</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/nilai/{{$nilai->id}}" method="post">
                   @method('PATCH')
                   @csrf
                   <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom01"> Mahasiswa</label>
                        <select name="mahasiswa_id" class="form-control  @error('mahasiswa_id') is-invalid @enderror" value="{{old('mahasiswa_id',$nilai->mahasiswa_id)}}" name="mahasiswa_id" required >
                            @foreach ($mahasiswas as $mahasiswa )
                            <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }}</option>
                            @endforeach
                        </select>
                        @error('mahasiswa_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror






                        <label for="validationCustom01">Tugas</label>
                        <input type="number" class="form-control  @error('tugas') is-invalid @enderror" value="{{old('tugas', $nilai->tugas)}}" name="tugas" >
                        @error('tugas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="validationCustom01">Kuis</label>
                        <input type="number" class="form-control  @error('kuis') is-invalid @enderror" value="{{old('kuis',$nilai->kuis)}}" name="kuis" >
                        @error('kuis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="validationCustom01">UTS</label>
                        <input type="number" class="form-control  @error('uts') is-invalid @enderror" value="{{old('uts',$nilai->uts)}}" name="uts" >
                        @error('uts')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="validationCustom01">UAS</label>
                        <input type="number" class="form-control" value="{{old('uas',$nilai->uas)}}"  name="uas" >




                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                        <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-edit"> Update</i></button>
                        <a href="/nilaimahasiswa" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
