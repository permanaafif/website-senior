@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">EDIT NILAI AKHIR</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/dosen/{{$dosens->id}}" method="post">
                   @method('PATCH')
                   @csrf
                   <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom01">Nama</label>
                        <input type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{old('nama', $dosens->nama)}}" name="nama" required>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Nip</label>
                        <input type="text" class="form-control  @error('nip') is-invalid @enderror" value="{{old('nip', $dosens->nip)}}" name="nip" required>
                        @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Jenis Kelamin</label>
                        <input type="text" class="form-control  @error('jenis_kelamin') is-invalid @enderror" value="{{old('jenis_kelamin', $dosens->jenis_kelamin)}}" name="jenis_kelamin" required>
                        @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Tanggal Lahir</label>
                        <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror" value="{{old('tanggal_lahir', $dosens->tanggal_lahir)}}" name="tanggal_lahir" required>
                        @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Alamat</label>
                        <textarea type="text" class="form-control  @error('alamat') is-invalid @enderror" value="{{old('alamat', $dosens->alamat)}}" name="alamat" required>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </textarea>

                    <label for="validationCustom01">Nomor Telepon</label>
                    <input type="text" class="form-control  @error('nomor_telepon') is-invalid @enderror" value="{{old('nomor_telepon', $dosens->nomor_telepon)}}" name="nomor_telepon" required>
                    @error('nomor_telepon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <label for="validationCustom01">Email</label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" value="{{old('email', $dosens->email)}}" name="email" required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror





                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                        <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-edit"> Update</i></button>
                        <a href="/dosen" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
