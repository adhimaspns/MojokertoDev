@extends('template/base')

@section('title', 'MojoDev')

@section('title-header-content', 'Edit Admin')

@push('customcss')
  <style>
    .img-admin {
      width: 200px;
      height: 200px;
      background-size: cover;
      background-repeat: no-repeat;
      margin: 20px 10px;
      box-shadow: 4px 4px 5px rgba(0, 0, 0, 0.5)
      }
  </style>
@endpush

{{-- Konten --}}
@section('main-content')

  @section('breadcrumb')
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('homeauth.login') }}">Beranda</a></li>
    <li class="breadcrumb-item">
      <a href="{{ url('admin') }}">Data Admin</a>
    </li>
    <li class="breadcrumb-item active">Edit Admin</li>
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
            <h3 class="card-title"> 
              <i class="fas fa-user-edit"></i>
              Edit Admin
            </h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('admin.update', $admin->id ) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
              <div class="form-group">
                <label> Nama Depan </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $admin->name}}">
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Nama Belakang </label>
                <input type="text" class="form-control @error('back_name') is-invalid @enderror" name="back_name" value="{{ $admin->back_name}}">
                @error('back_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Alamat </label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $admin->address }}">
                @error('address')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Kota </label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $admin->city }}">
                @error('city')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Kecamatan </label>
                <input type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ $admin->region }}">
                @error('region')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Nomer Telp </label>
                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $admin->phone }}">
                @error('phone')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Usia </label>
                <input type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $admin->age }}">
                @error('age')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Username </label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $admin->username }}">
                @error('username')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> E-mail </label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $admin->email }}">
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $admin->password}}">
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Foto </label>
                <img src="{{ URL::asset('image/user/' . $admin->foto) }}" alt="image-admin" class="img-thumbnail img-admin"> 
                <small class="text-muted">{{$admin->foto}}</small>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="file">
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