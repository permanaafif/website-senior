@extends('layouts.main')
@section('menu', 'active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM CP PRODI</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/cplprodi" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="validationCustom01">Judul</label>
                            <input type="text" class="form-control  @error('judul') is-invalid @enderror" value="{{old('judul')}}" name="judul" required>
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Isi</label>
                            <textarea type="text" class="form-control  @error('isijudul') is-invalid @enderror" value="{{old('isijudul')}}" name="isijudul" required></textarea>
                            @error('isijudul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror








                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/cplprodi" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
