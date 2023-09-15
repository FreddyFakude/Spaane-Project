{{--@extends("layouts.auth")--}}

<x-frontend.auth_template>
    <section class="mt-5">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-12">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-5 d-flex align-items-center bg-teal">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Don't Have An Account?</h4>
                                    <p class="small mb-0">Please click sign up to create a new account</p>
                                    <a class="btn btn-primary" href="{{ route('employee.login') }}">SIGNUP</a>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card-body p-md-5 mx-md-4">
                                    <form action="{{ route('employee.login') }}" method="post">
                                        <div class="text-center">
                                            <h4 class="mt-1 mb-5 pb-1">Login To Account</h4>
                                        </div>

                                        <div class="input-group mb-4">
                                            <span class="input-group-text border-0">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            <input type="email" name="email" class="form-control bg-light-grey border-0"
                                                   placeholder="Email address" />
                                        </div>

                                        <div class="input-group mb-4">
                                            <span class="input-group-text border-0">
                                                    <i class="fa fa-key"></i>
                                                </span>
                                            <input type="password" placeholder="Password" name="password" class="form-control border-0 bg-light-grey" />
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            @csrf
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                                                in</button>
                                            <a class="text-muted" href="#ytr

\\\\\''8761z';pwewr=rh;l34rhxccvb?bv">Forgot password?</a>
                                        </div>

                                        <div class="text-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
{{--                                            <a href="{{ route('talent.signup.form') }}" class="btn btn-outline-danger">Create new</a>--}}
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-frontend.auth_template>

{{--@section("content")--}}
{{--    <!-- Main Container -->--}}
{{--    <main id="main-container">--}}

{{--        <!-- Page Content -->--}}
{{--        <div class="bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">--}}
{{--            <div class="row mx-0 justify-content-center">--}}
{{--                <div class="hero-static col-lg-6 col-xl-4">--}}
{{--                    <div class="content content-full overflow-hidden">--}}
{{--                        <!-- Header -->--}}
{{--                        <a href="/">--}}
{{--                            <div class="py-30 text-center">--}}
{{--                                <img src="{{ asset('assets/images/Teambix Logo v2.png') }}" alt="logo" width="200">--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <!-- END Header -->--}}

{{--                        <!-- Sign In Form -->--}}
{{--                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.js) -->--}}
{{--                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->--}}
{{--                        <form class="js-validation-signin" action="{{route('talent.login')}}" method="post">--}}
{{--                            <div class="block block-themed block-rounded block-shadow">--}}
{{--                                <div class="block-header bg-blue">--}}
{{--                                    <h3 class="block-title">Log In</h3>--}}
{{--                                </div>--}}
{{--                                <div class="block-content">--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <div class="col-12">--}}
{{--                                            <label for="login-username">Email</label>--}}
{{--                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="login-username" name="email" required>--}}
{{--                                            @csrf--}}
{{--                                            @error('email')--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                    <strong>{{ $message }}</strong>--}}
{{--                                                </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <div class="col-12">--}}
{{--                                            <label for="login-password">Passwordss</label>--}}
{{--                                            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="login-password" name="password" required>--}}
{{--                                            @error('password')--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                    <strong>{{ $message }}</strong>--}}
{{--                                                </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row mb-0">--}}
{{--                                        <div class="col-sm-6 d-sm-flex align-items-center push">--}}
{{--                                            <div class="custom-control custom-checkbox mr-auto ml-0 mb-10">--}}
{{--                                                <input type="checkbox" class="custom-control-input"  name="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                                <label class="custom-control-label" for="login-remember-me">Remember Me</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 text-sm-right push">--}}
{{--                                            <button type="submit" class="btn btn-custom mb-10">--}}
{{--                                                <i class="si si-login mr-10"></i> Sign In--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="block-content bg-body-light">--}}
{{--                                    <div class="form-group text-center">--}}
{{--                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{route('register', 1)}}">--}}
{{--                                            <i class="fa fa-plus mr-5"></i> Create Account--}}
{{--                                        </a>--}}
{{--                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{route('password.request')}}">--}}
{{--                                            <i class="fa fa-warning mr-5"></i> Forgot Password--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                        <!-- END Sign In Form -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- END Page Content -->--}}

{{--    </main>--}}
{{--    <!-- END Main Container -->--}}
{{--@endsection--}}
