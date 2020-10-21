@extends('template/base')

@section('title', 'MojoDev')

@section('title-header-content', 'Detail Data Admin')

@push('customcss')
    <style>
      
      .img-user {
        width: 200px;
        height: 200px;
        background-size: cover;
        background-repeat: no-repeat;
      }
      .btn-detail {
        margin: 20px 0;
        float: right;
      }
    
    </style>
@endpush

@section('main-content')

  @section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item">
        <a href="{{ url('homeauth.login') }}">Beranda</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ url('mentor') }}">Data Mentor</a>
      </li>
      <li class="breadcrumb-item active">Detail Data Mentor</li>
    </ol>
  @endsection
    
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header bg-primary">
            <h3 class="card-title"> 
              <i class="fas fa-eye"></i>
              Detail Data
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table id="example2" class="table table-bordered">
              <thead>
              <tr class="table-active">
                <th> No</th>
                <th> Nama </th>
                <th> E-Mail </th>
                <th> Pekerjaan </th>
                <th> Foto </th>
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td> {{ $mentor->id}}       </td>
                  <td> {{ $mentor->nama}}       </td>
                  <td> {{ $mentor->email}}  </td>
                  <td> {{ $mentor->pekerjaan}}    </td>
                  <td>
                    {{-- Show Image form directory & DB --}}
                    <img src="{{ URL::asset('image/mentor/' . $mentor->foto) }}" class="card-img-top img-user" alt="Image-admin">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-lg-12">
        <a href="{{ url('mentor') }}" class="btn btn-primary btn-detail">
          <i class="fas fa-angle-left"></i> Kembali
        </a>
      </div>
    </div>
  </div>
@endsection
