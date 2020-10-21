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
        @if (session('hapus'))
          <div class="alert alert-success alert-data">
            {{ session('hapus')}} |
            <a href="{{ url('mentor') }}"> Oke</a>
          </div>  
        @endif
        @if (session('update'))
        <div class="alert alert-success alert-data">
          {{ session('update')}} |
          <a href="{{ url('mentor') }}"> Oke</a>
        </div>  
      @endif
        
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-database"></i> 
              Data Mentor
            </h3>

            <div class="card-tools">
              <form action="{{ route('mentor.cari') }}" method="GET"  class="form-inline  my-2 my-lg-0">
                <input class="form-control form-control-sm" type="text" name="cari" placeholder="Cari" aria-label="Search" value="{{ old('cari') }}">
                
                <button class="btn btn-sm btn-success my-2 my-sm-0" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </form>

              {{-- <div class="input-group input-group-sm" style="width: 150px;">
                <form action="{{ route('mentor.cari') }}" method="GET">
                  <input type="text" name="cari" class="form-control float-right" placeholder="Cari" value="{{ old('cari') }}">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </form>
              </div> --}}
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Nama </th>
                  <th> Pekerjaan </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                
                  @foreach ($mentor as $mtr)
                  <tr>
                    <td> {{ $mtr->id }} </td>
                    <td> {{ $mtr->nama}} </td>
                    <td> {{ $mtr->pekerjaan}} </td>
                    <td>
                      @if (auth()->user()->role == 'superadmin')
                        <a href="{{ route('mentor.edit', $mtr->id) }}" class="btn btn-sm btn-warning"> 
                          <i class="fas fa-user-edit"></i>
                        </a> 
                        <form action="{{ route('mentor.destroy', $mtr->id) }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-sm btn-danger"> 
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
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