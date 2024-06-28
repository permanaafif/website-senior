@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM Otorisasi</h5>
            <div class="card-body">
                {{-- <input type="hidden" name="otorisasis" value="otorisasi"> --}}
                <form class="needs-validation" action ="/otorisasi" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                            <label for="validationCustom01">Pengembang RPS</label>
                            <textarea type="text" class="form-control  @error('pe_rps') is-invalid @enderror" value="{{old('pe_rps')}}" name="pe_rps" required></textarea>
                            @error('pe_rps')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Koordinator Program Studi</label>
                            <input type="text" class="form-control  @error('koprodi') is-invalid @enderror" value="{{old('koprodi')}}" name="koprodi" required>
                            @error('koprodi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Ketua Jurusan</label>
                            <input type="text" class="form-control  @error('kajur') is-invalid @enderror" value="{{old('kajur')}}" name="kajur" required>
                            @error('kajur')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror





                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            {{-- <form method="POST" action="{{ route('switch.table') }}">
                                @csrf
                                <label for="table">Pilih Tabel:</label>
                                <select name="table" id="table">
                                    <option value="otorisasi" @if(session('Pustaka') == 'otorisasi') selected @endif>Pustaka</option> --}}
                                    {{-- <option value="pustaka" @if(session('active_table') == 'pustaka') selected @endif>Pustaka</option> --}}
                                {{-- </select>
                                <button type="submit">Switch</button>
                            </form> --}}
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/otorisasi" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
