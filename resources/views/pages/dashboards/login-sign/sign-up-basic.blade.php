
@extends('layouts.custom-master')

@php
// Passing the bodyClass variable from the view to the layout
$bodyClass = 'authentication-background';
@endphp

@section('styles')



@endsection

@section('content')
	
        <div class="authentication-basic-background">
            <img src="{{asset('build/assets/images/media/backgrounds/9.png')}}" alt="">
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-6 col-sm-8 col-12">
                    <div class="card custom-card border-0 my-4">
                        <div class="card-body p-5">
                            <div class="mb-4"> 
                                <a href="{{url('index')}}"> 
                                    <img src="{{asset('build/assets/images/brand-logos/toggle-logo.png')}}" alt="logo" class="desktop-dark"> 
                                </a> 
                            </div>
                            <div>
                                <h4 class="mb-1 fw-semibold">Sign Up</h4>
                                <p class="mb-4 text-muted fw-normal">Join us by creating a free account !</p>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <label for="signup-name" class="form-label text-default">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="signup-name" name="name" placeholder="Enter Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-12">
                                        <label for="signup-email" class="form-label text-default">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="signup-email" name="email" placeholder="Enter Email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-12">
                                        <label for="signup-password" class="form-label text-default d-block">Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="signup-password" name="password" placeholder="Enter Password" required autocomplete="new-password">
                                            <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signup-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12 mb-2">
                                        <label for="signup-password-confirmation" class="form-label text-default d-block">Confirm Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control" id="signup-password-confirmation" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                            <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signup-password-confirmation',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid mt-3">
                                    <button type="submit" class="btn btn-primary">Create Account</button>
                                </div>
                            </form>
                            <div class="text-center my-3 authentication-barrier">
                                <span class="op-4 fs-13">OR</span>
                            </div>
                            <div class="d-grid mb-3">
                                <button class="btn btn-white btn-w-lg border d-flex align-items-center justify-content-center flex-fill mb-3">
                                    <span class="avatar avatar-xs">
                                        <img src="{{asset('build/assets/images/media/apps/google.png')}}" alt="">
                                    </span>
                                    <span class="lh-1 ms-2 fs-13 text-default fw-medium">Signup with Google</span>
                                </button>
                                <button class="btn btn-white btn-w-lg border d-flex align-items-center justify-content-center flex-fill">
                                    <span class="avatar avatar-xs flex-shrink-0">
                                        <img src="{{asset('build/assets/images/media/apps/facebook.png')}}" alt="">
                                    </span>
                                    <span class="lh-1 ms-2 fs-13 text-default fw-medium">Signup with Facebook</span>
                                </button>
                            </div>
                            <div class="text-center mt-3 fw-medium">
                                Already have a account? <a href="{{ route('login') }}" class="text-primary">Sign In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')
	
        <!-- Show Password JS -->
        <script src="{{asset('build/assets/show-password.js')}}"></script>

@endsection
