@extends('template/base')

@section('title', 'MojokertoDev')

@section('title-header-content', 'Data Mentor')

@section('main-content')

  @section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/home') }}">Beranda</a></li>
      <li class="breadcrumb-item active">Data Mentor</li>
    </ol>
  @endsection

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        @if (auth()->user()->role == 'superadmin')
          <a href="{{ url('mentor/create')}}" class="btn btn-sm btn-primary button-create" style="margin: 20px 0">
            <i class="fas fa-plus"></i> Mentor
          </a>  
        @endif
        
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-database"></i> 
              Data Mentor
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
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                
                  @foreach ($mentor as $mtr)
                  <tr>
                    <td> {{ $mtr->id }} </td>
                    <td> {{ $mtr->nama}} </td>
                    <td>
                      @if (auth()->user()->role == 'superadmin')
                        <a href="#" class="btn btn-sm btn-warning"> 
                          <i class="fas fa-edit"></i>
                        </a> 
                        <a href="#" class="btn btn-sm btn-danger"> 
                          <i class="fas fa-trash"></i>
                        </a>
                      @endif
                      <a href="{{ url('mentor/detail', $mtr->id) }}" class="btn btn-sm btn-info"> 
                        <i class="fas fa-eye"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>

            <div class="pull-right ml-auto link-paginate">
              {!! $mentor->links() !!}
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
@endsection