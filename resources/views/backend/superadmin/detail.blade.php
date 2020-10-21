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
        <a href="{{ url('superadmin/data-admin') }}">Data Admin</a>
      </li>
      <li class="breadcrumb-item active">Detail Data Admin</li>
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
                <th> Nama Depan </th>
                <th> Nama Belakang</th>
                <th> Alamat</th>
                <th> Kota</th>
                <th> Kecamatan</th>
                <th> No. Telp</th>
                <th> Usia</th>
                <th> Username</th>
                <th> Email</th>
                <th> Foto</th>
                <th> Bergabung Sejak</th>
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td> {{ $loop->iteration}}       </td>
                  <td> {{ $admin->name}}       </td>
                  <td> {{ $admin->back_name}}  </td>
                  <td> {{ $admin->address}}    </td>
                  <td> {{ $admin->city}}       </td>
                  <td> {{ $admin->region}}     </td>
                  <td> {{ $admin->phone}}      </td>
                  <td> {{ $admin->age}}        </td>
                  <td> {{ $admin->username}}   </td>
                  <td> {{ $admin->email}}      </td>
                  <td>
                    {{-- Show Image form directory & DB --}}
                    <img src="{{ URL::asset('image/user/' . $admin->foto) }}" class="card-img-top img-user" alt="Image-admin">
                    {{-- <img src="{{ $admin->foto }}" class="card-img-top img-user" alt="Image-admin"> --}}
                  </td>
                  <td> {{ $admin->created_at->format('d/m/Y') }} </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-lg-12">
        <a href="{{ url('admin') }}" class="btn btn-primary btn-detail">
          <i class="fas fa-angle-left"></i> Kembali
        </a>
      </div>
    </div>
  </div>
@endsection
