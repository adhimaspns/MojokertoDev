@extends('template/base')

@section('title', 'MojoDev')

@section('title-header-content', 'Data Admin')

@push('customcss')
  <style>
    .button-create {
      margin: 20px 0;
    }
    .link-paginate {
      margin: 10px;
      float: right
    }
    .alert-data {
      margin: 20px;
    }
  </style>
@endpush

@section('main-content')

  @section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/home') }}">Beranda</a></li>
      <li class="breadcrumb-item active">Data Admin</li>
    </ol>
  @endsection

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <a href="{{ url('admin/create')}}" class="btn btn-sm btn-primary button-create">
            <i class="fas fa-plus"></i> Admin
          </a>
          @if (session('status'))
            <div class="alert alert-success alert-data">
              {{ session('status')}}
            </div>
          @endif
          @if (session('hapus'))
          <div class="alert alert-success alert-data">
            {{ session('hapus')}} |
            <a href="{{ url('admin') }}"> Oke</a>
          </div>  
          @endif
          @if (session('update'))
          <div class="alert alert-success alert-data">
            {{ session('update')}} |
            <a href="{{ url('admin') }}"> Oke</a>
          </div>  
          @endif
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-database"></i> 
                Data Admin
                </h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Nama </th>
                    {{-- <th> Nama Belakang </th>
                    <th> Alamat</th>
                    <th> Kota </th>
                    <th> Kecamatan </th>
                    <th> Nomor Telp</th>
                    <th> Umur </th> --}}
                    <th> Username </th>
                    <th> E-mail </th>
                    <th> Role </th>
                    <th> Aksi </th>
                  </tr>
                </thead>
                <tbody>
                  
                    @foreach ($admins as $index => $admin)
                    <tr>
                      <td> {{ $admins->firstItem() + $index }} </td>
                      <td> {{ $admin->name }}</td>
                      <td> {{ $admin->username }}</td>
                      <td> {{ $admin->email }}</td>
                      <td>
                        @if ($admin->role == "user")
                          <span class="badge badge-primary">User</span>
                        @endif
                        @if ($admin->role == "admin")
                          <span class="badge badge-success">Admin</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-sm btn-warning">
                          <i class="fas fa-user-edit"></i>
                        </a>
                        <a href="{{ url('admin/detail',$admin->id) }}" class="btn btn-sm btn-info">
                          <i class="fas fa-eye"></i>
                        </a>
                        <form action="{{ route('admin.destroy', $admin->id) }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-sm btn-danger"> 
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="pull-right ml-auto link-paginate">
            {!! $admins->links() !!}
          </div>
        </div>
      </div>
    </div>
@endsection