@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card card-primary" style="margin-top: 150px">
        <div class="card-header">
          <h3 class="card-title">
            {{ __('Login') }}
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          {{-- Form --}}
            <form method="POST" action="{{ route('login') }}">
              @csrf
            
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail / Username') }}</label>
          
                <div class="col-md-6">                  
								  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
								  {{-- Pesan Eror --}}
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            
              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
          
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            
              {{-- <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      
                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
              </div> --}}
            
              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>
        
                  {{-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  @endif --}}
                </div>
              </div>
            </form>
          {{-- / Form --}}
        </div>
       
      </div>
    </div>
  </div>
</div>
@endsection



<!-- general form elements -->
{{-- <div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Quick Example</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form">
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text" id="">Upload</span>
          </div>
        </div>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div> --}}
<!-- /.card -->


