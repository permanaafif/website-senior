
@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM Pustakas</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/rpactivit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="validationCustom01">Minggu</label>
                            <input type="text" class="form-control  @error('minggu') is-invalid @enderror" value="{{old('minggu')}}" name="minggu" required>
                            @error('minggu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">SubCpmk  </label>
                            <select class="form-control  @error('subcpmk_id') is-invalid @enderror" value="{{old('subcpmk_id')}}" name="subcpmk_id" required>
                                @foreach ($mata_kuliahs as $mata_kuliah )
                                <option value="{{ $mata_kuliah->id }}">{{ $mata_kuliah->matkul }}</option>
                                @endforeach
                            </select>
                            @error('subcpmk_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Bahan Kajian Pembelajaran</label>
                            <input type="text" class="form-control  @error('bk_pemb') is-invalid @enderror" value="{{old('bk_pemb')}}" name="bk_pemb" required>
                            @error('bk_pemb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Metode Pembelajaran</label>
                            <input type="text" class="form-control  @error('mt_pemb') is-invalid @enderror" value="{{old('mt_pemb')}}" name="mt_pemb" required>
                            @error('mt_pemb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Waktu </label>
                            <select  class="form-control  @error('wk_sk_id') is-invalid @enderror" value="{{old('wk_sk_id')}}" name="wk_sk_id" required>
                                @foreach ($wk_penilaians as $wk_penilaian )
                                <option value="{{ $wk_penilaian->id }}">{{ $wk_penilaian->utama }}</option>
                                @endforeach
                            </select>
                            @error('wk_sk_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Penilaian </label>
                            <select class="form-control  @error('penilaian_id') is-invalid @enderror" value="{{old('penilaian_id')}}" name="penilaian_id" required>
                                @foreach ($penilaians as $penilaian )
                                <option value="{{ $penilaian->id }}">{{ $penilaian->nama }}</option>
                                @endforeach
                            </select>
                            @error('penilaian_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror








                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/rpactivit" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
