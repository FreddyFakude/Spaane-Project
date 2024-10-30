<x-frontend.auth_template>
    <section class="mt-5">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center py-3 px-3">
                <img height="20%" width="20%" src="{{ asset('assets/images/spaane_white.png') }}">
            </div>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-12">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center">
                                <img height="100%" width="100%" src="{{ asset('assets/images/browser-window-displaying-workspace-.svg') }}">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <form action="{{ route('company.login') }}" method="post">
                                        <div class="text-center">
                                            <h4 class="mt-1 mb-5 pb-1">Login To Account</h4>
                                        </div>

                                        <div class="text-center">
                                            @if($errors->has('login_error'))
                                                <span class="text-danger">{{ $errors->first('login_error') }}</span>
                                            @endif
                                        </div>                                        

                                        {{-- Email Field --}}
                                        <div class="input-group mb-4">
                                            <input type="email" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" />
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- Password Field --}}
                                        <div class="input-group mb-4">
                                            <input type="password" placeholder="Password" name="password" class="form-control" />
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- Submit Button --}}
                                        <div class="text-center pt-1 mb-2">
                                            @csrf
                                            <button class="btn btn-success btn-rounded mb-3" type="submit">Log in</button>
                                        </div>

                                        {{-- Forgot Password Link --}}
                                        <div class="text-center pt-1 mb-2 pb-1">
                                            <a class="text-muted" href="#">Forgot password?</a>
                                        </div>

                                        {{-- Register Link --}}
                                        <div class="text-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <a href="{{ route('company.register.form') }}" class="btn btn-rounded btn-outline-primary">Create new</a>
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
