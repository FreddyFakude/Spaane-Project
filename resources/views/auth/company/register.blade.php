<x-frontend.auth_template>
    <section class="mt-5">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center py-3 px-3">
                <img height="20%" width="20%" src="{{asset('assets/images/spaane_white.png')}}">
            </div>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-12">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center">
                                <img height="100%" width="100%" src="{{asset('assets/images/browser-window-displaying-workspace-.svg')}}">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <form action="{{ route('company.register') }}" method="post">
                                        <div class="text-center">
                                            <h4 class="mt-1 mb-5 pb-1">Register Company</h4>
                                        </div>

                                        {{-- First Name Field --}}
                                        <div class="input-group mb-4">
                                            <input type="text" name="first_name" class="form-control" placeholder="First name" value="{{ old('first_name') }}" 
                                                pattern="[A-Za-z]+" title="First name must only contain alphabetic characters." required />
                                            @if ($errors->has('first_name'))
                                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>

                                        {{-- Last Name Field --}}
                                        <div class="input-group mb-4">
                                            <input type="text" name="last_name" class="form-control" placeholder="Last name" value="{{ old('last_name') }}" 
                                                pattern="[A-Za-z]+" title="Last name must only contain alphabetic characters." required />
                                            @if ($errors->has('last_name'))
                                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                            @endif
                                        </div>

                                        {{-- Email Field --}}
                                        <div class="input-group mb-4">
                                            <input type="email" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" />
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>

                                        {{-- Password Field --}}
                                        <div class="input-group mb-4">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" onkeyup="checkPasswordStrength()" />
                                        </div>

                                        <p>
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </p>

                                        {{-- Password Strength Indicator --}}
                                        <div id="password-strength" class="mb-4"></div>

                                        {{-- Confirm Password Field --}}
                                        <div class="input-group mb-4">
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password confirm" />
                                        </div>

                                        {{-- Submit Button --}}
                                        <div class="text-center pt-1 mb-2">
                                            @csrf
                                            <button class="btn btn-rounded btn-outline-primary" type="submit">Register</button>
                                        </div>

                                        {{-- Login Link --}}
                                        <div class="text-center pb-4">
                                            <p class="mb-0 me-2">Already have an account? Login here</p>
                                            <a href="{{ route('company.login.form') }}" class="btn btn-rounded btn-outline-success">Login</a>
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

    {{-- Add this script to handle password strength --}}
    <script>
        function checkPasswordStrength() {
            var strength = document.getElementById('password-strength');
            var password = document.getElementById('password').value;
            var strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/;
            var mediumRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}$/;
            
            if (strongRegex.test(password)) {
                strength.innerHTML = '<span class="text-success">Strong</span>';
            } else if (mediumRegex.test(password)) {
                strength.innerHTML = '<span class="text-warning">Medium</span>';
            } else {
                strength.innerHTML = '<span class="text-danger">Weak</span>';
            }
        }
    </script>
</x-frontend.auth_template>
