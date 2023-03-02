{{-- @extends('layouts.layout')

@section('content') --}}
<x-layout>
<div class="login-form mt-5">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Login</div>
                  <div class="card-body">

                    @if (Session::get('success'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                      <form action="{{ route('login.post') }}" method="POST">
                      {{-- <form action="" id="loginForm"> --}}
                          @csrf
                          <div class="form-group row mb-3">

                              <label for="email_address" class="col-md-4 col-form-label text-md-right">Email Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required />
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row mb-3">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required />
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>



                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Login
                              </button>
                              {{-- <button type="button" id="submit" class="btn btn-primary" onclick="login()">
                                  Login
                              </button> --}}
                          </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
{{-- @endsection --}}


</x-layout>
