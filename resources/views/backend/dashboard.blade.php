@extends('template/base')

@section('title', 'Dashboard')

@section('title-header-content', 'Dashboard')

@section('main-content')

  @section('breadcrumb')
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Beranda</a></li>
  </ol>
  @endsection
  <div class="row">

    @if (auth()->user()->role =='superadmin')
      <div class="col-lg-4 col-12">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>
              {{ $show }}
            </h3>

            <p> Showcase </p>
          </div>
          <div class="icon">
            <i class="fas fa-store"></i>
          </div>
          <a href="{{ url('showcase') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-4 col-12">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>
              {{ $event }}
            </h3>

            <p>Event </p>
          </div>
          <div class="icon">
            <i class="fas fa-calendar-alt"></i>
          </div>
          <a href={{ url('event') }} class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-12">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>
              {{ $user }}
            </h3>

            <p> Admin </p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="{{ url('admin') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col --> 

      <div class="col-lg-4 offset-lg-4 col-12">
        <!-- small box -->
        <div class="small-box bg-warning text-dark">
          <div class="inner">
            <h3>
              {{ $mentors }}
            </h3>

            <p> Mentor </p>
          </div>
          <div class="icon">
            <i class="fas fa-male"></i>
          </div>
          <a href="{{ url('mentor') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col --> 

    @else
    <div class="col-lg-6 col-12">
      <!-- small box -->
      <div class="small-box bg-secondary">
        <div class="inner">
          <h3>
            {{ $show }}
          </h3>

          <p> Showcase </p>
        </div>
        <div class="icon">
          <i class="fas fa-store"></i>
        </div>
        <a href="{{ url('showcase') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-6 col-12">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>
            {{ $event }}
          </h3>

          <p>Event </p>
        </div>
        <div class="icon">
          <i class="fas fa-calendar-alt"></i>
        </div>
        <a href={{ url('event') }} class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div> 

    <div class="col-lg-8 offset-lg-2 col-12">
      <!-- small box -->
      <div class="small-box bg-warning text-dark">
        <div class="inner">
          <h3>
            {{ $mentors }}
          </h3>

          <p> Mentor </p>
        </div>
        <div class="icon">
          <i class="fas fa-male"></i>
        </div>
        <a href="{{ url('mentor') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    @endif
    
  </div>
@endsection