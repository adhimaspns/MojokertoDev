@extends('template/base')

@section('title', 'MojokertoDev')

@section('title-header-content', 'Tambah Mentor')

{{-- Konten --}}
@section('main-content')

  @section('breadcrumb')
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Beranda</a></li>
    <li class="breadcrumb-item">
      <a href="{{ url('mentor') }}">Data Mentor</a>
    </li>
    <li class="breadcrumb-item active">Tambah Mentor</li>
  </ol>
  @endsection

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <!-- Form -->
        @if (session('sukses'))
          <div class="alert alert-success">
            {{ session('sukses')}}
            <a href="{{ url('mentor/create') }}" class="btn btn-primary" style="text-decoration: none; "> Oke</a>
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
              <i class="fas fa-plus"></i>
              Tambah Mentor
            </h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ url('mentor') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label> Nama </label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Adhimas" value="{{ old('nama') }}">
                @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> E-mail </label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="ex.gmail.com" value="{{ old('email') }}">
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label> Pekerjaan </label>
                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" placeholder="Web Developer" value="{{ old('address') }}">
                @error('pekerjaan')
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