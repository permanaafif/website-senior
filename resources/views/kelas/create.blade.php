@extends('layouts.main')
@section('menu', 'active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM Kelas</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/kelas" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                            <label for="validationCustom01">Dosen</label>
                            <select  class="form-control  @error('user_id') is-invalid @enderror" value="{{old('user_id')}}" name="user_id" required>
                                @foreach ($users as $user )
                                <option value="{{ $user->id }}">{{ $user->nama}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Kode Kelas MK</label>
                            <input type="text" class="form-control  @error('kode_kelasmk') is-invalid @enderror" value="{{old('kode_kelasmk')}}" name="kode_kelasmk" required>
                            @error('kode_kelasmk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Prodi</label>
                            <input type="text" class="form-control  @error('prodi') is-invalid @enderror" value="{{old('prodi')}}" name="prodi" required>
                            @error('prodi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Kelas</label>
                            <input type="text" class="form-control  @error('kelas') is-invalid @enderror" value="{{old('kelas')}}" name="kelas" required>
                            @error('kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Mata Kuliah</label>
                            <select  class="form-control  @error('mata_kuliah_id') is-invalid @enderror" value="{{old('mata_kuliah_id')}}" name="mata_kuliah_id" id="mata_kuliah">
                                @foreach ($matakuliahs as $matakuliah )
                                <option value="{{ $matakuliah->id }}">{{ $matakuliah->matkul }}</option>
                                @endforeach
                            </select>
                            @error('mata_kuliah_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Kode MK</label>
                            <input type="text" class="form-control  @error('kodemk') is-invalid @enderror" value="{{old('kodemk')}}" name="kodemk" id="kodemk" readonly>
                            @error('kodemk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">SKS MK</label>
                            <input type="text" class="form-control  @error('sksmk') is-invalid @enderror" id="sksmk" name="sksmk" readonly>
                            @error('sksmk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror







                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/kelas" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')



<script type="text/javascript">
    // public/js/custom.js
    $(document).ready(function () {
        $.ajaxSetup({
            headers:{
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $("#mata_kuliah").on("change", function () {
            var selectedValue = $(this).val();

            $.ajax({
                type: 'POST',
                url: "/get_field_matakuliah/"+ selectedValue,
                data:{
                    id: $(this).val(),
                    sks :$(this).val(),
                    kode_mk : $(this).val(),
                },
                dataType:"JSON",
                success: function (data) {

                    // Mengisi field lainnya dengan data yang diterima
                  document.getElementById('sksmk').value =data.sks;
                  document.getElementById('kodemk').value =data.kode_mk;
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
    </script>
@endsection
