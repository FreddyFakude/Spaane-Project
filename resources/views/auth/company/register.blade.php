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
                                    <form action="{{ route('company.register') }}" method="post">
                                        <div class="text-center">
                                            <h4 class="mt-1 mb-5 pb-1">Register Company</h4>
                                        </div>

                                        <div class="input-group mb-4">
                                            <input type="text" name="first_name" class="form-control"
                                                   placeholder="First name" />
                                        </div>

                                        <div class="input-group mb-4">
                                            <input type="text" name="last_name" class="form-control"
                                                   placeholder="Last name" />
                                        </div>

                                        <div class="input-group mb-4">
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="Email address" />
                                        </div>

                                        <div class="input-group mb-4">
                                            <input type="password" placeholder="Password" name="password" class="form-control" />
                                        </div>

                                        <div class="input-group mb-4">
                                            <input type="password" placeholder="Password confirm" name="password_confirmation" class="form-control" />
                                        </div>

                                        <div class="text-center pt-1 mb-2">
                                            @csrf
                                            <button class="btn btn-primary fa-lg gradient-custom-2 mb-3" type="submit">Register</button>
                                        </div>

                                        <div class="text-center pb-4">
                                            <p class="mb-0 me-2">already have an account? Login here</p>
                                           <a href="{{ route('company.login.form') }}" class="btn btn-outline-danger">Login</a>
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
