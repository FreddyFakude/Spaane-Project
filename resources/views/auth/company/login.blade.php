<x-frontend.template>
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
                                    <a class="btn btn-primary" href="{{ route('company.login.form') }}">SIGNUP</a>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card-body p-md-5 mx-md-4">
                                    <form action="{{ route('company.login') }}" method="post">
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

                                        <div class="pb-4 text-center">
                                            <a href="{{ route('company.login') }}"><small>Business login here</small></a>
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
</x-frontend.template>
