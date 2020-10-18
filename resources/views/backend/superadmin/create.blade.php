@extends('template/base')

@section('title', 'MojoDev')

@section('title-header-content', 'Tambah Admin')

{{-- Konten --}}
@section('main-content')

  @section('breadcrumb')
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('homeauth.login') }}">Beranda</a></li>
    <li class="breadcrumb-item">
      <a href="{{ url('admin') }}">Data Admin</a>
    </li>
    <li class="breadcrumb-item active">Tambah Admin</li>
  </ol>
  @endsection

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <!-- Form -->
        @if (session('sukses'))
          <div class="alert alert-success">
            {{ session('sukses')}}
            <a href="{{ url('admin/create') }}" class="btn btn-primary" style="text-decoration: none; "> Oke</a>
          </div> 
        @endif
        @if (session('gagal'))
          <div class="alert alert-success">
            {{ session('gagal')}}
          </div>  
        @endif
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"> Tambah Admin</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ url('admin') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label> Nama Depan </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Adhimas" value="{{ old('name') }}">
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Nama Belakang </label>
                <input type="text" class="form-control @error('back_name') is-invalid @enderror" name="back_name" placeholder="Sugianto" value="{{ old('back_name') }}">
                @error('back_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Alamat </label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="No.12 Jl.Munasir, RT.01 RW.02" value="{{ old('address') }}">
                @error('address')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Kota </label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="Mojokerto" value="{{ old('city') }}">
                @error('city')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Kecamatan </label>
                <input type="text" class="form-control @error('region') is-invalid @enderror" name="region" placeholder="Puri" value="{{ old('region') }}">
                @error('region')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Nomer Telp </label>
                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="08161*******" value="{{ old('phone') }}">
                @error('phone')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Usia </label>
                <input type="number" class="form-control @error('age') is-invalid @enderror" name="age" placeholder="18" value="{{ old('age') }}">
                @error('age')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Username </label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="adhimas" value="{{ old('username') }}">
                @error('username')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> E-mail </label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="adhimas@gmail.com" value="{{ old('email') }}">
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="min : 6">
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Foto </label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}">
                @error('foto')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /. from -->
      </div>
    </div>
  </div>
    
@endsection