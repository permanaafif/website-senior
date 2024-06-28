@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM MATAKULIAH</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/subcpmk" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="validationCustom01">SKS</label>
                            <select name="cp_mk_id" class="form-control  @error('cp_mk_id') is-invalid @enderror" value="{{old('cp_mk_id')}}" name="cp_mk_id" required>
                                @foreach ($cp_mks as $cp_mk )
                                <option value="{{ $cp_mk->id }}">{{ $cp_mk->judul }}</option>
                                @endforeach
                            </select>
                            @error('cp_mk_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">deskripsi</label>
                            <input type="text" class="form-control  @error('deskripsi') is-invalid @enderror" value="{{old('deskripsi')}}" name="deskripsi" required>
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror










                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/subcpmk" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
