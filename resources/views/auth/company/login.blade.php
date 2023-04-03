<x-frontend.auth_template>
    <section class="mt-5">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center py-3 px-3">
                <img height="30%" width="30%" src="{{asset('assets/images/spaane_white_transparent.png')}}">
            </div>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-12">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center">
                                {{-- <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Choose your account</h4>
                                    <p class="small mb-0">Please click sign up to create a new account</p>
                                    <a class="btn btn-primary" href="{{ route('business.signup.form') }}">SIGNUP</a>
                                </div> --}}
                                <img height="100%" width="100%" src="{{asset('assets/images/browser-window-displaying-workspace-.svg')}}">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <form action="{{ route('company.login') }}" method="post">
                                        <div class="text-center">
                                            <h4 class="mt-1 mb-5 pb-1">Login To Account</h4>
                                        </div>

                                        <div class="input-group mb-4">
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="Email address" />
                                        </div>

                                        <div class="input-group mb-4">
                                            <input type="password" placeholder="Password" name="password" class="form-control" />
                                        </div>

                                        <div class="text-center pt-1 mb-2">
                                            @csrf
                                            <button class="btn btn-primary fa-lg gradient-custom-2 mb-3" type="submit">Log
                                                in</button>
                                        </div>
                                        <div class="text-center pt-1 mb-2 pb-1">
                                            <a class="text-muted" href="#ytr\\\\\''8761z';pwewr=rh;l34rhxccvb?bv">Forgot password?</a>
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
