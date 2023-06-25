<x-dashboard.template>
    <!-- Page Content -->
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <div class="content mt-30">
        <div class="block">
            <div class="block-header block-header-default">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissable w-100" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                        <p class="mb-0">{{ session()->get('success') }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="row justify-content-center pt-5">
                        <div class="col-md-8 col-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="block-content">
                <form action="{{ route('company.update.admin.profile') }}" method="POST">
                    <div class="d-flex justify-content-start mt-20">
                        <div>
                            <h4>Profile information</h4>
                        </div>
                    </div>
                    <div class="row px-10 mt-30">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">First Name*</label>
                                <input type="text" class="form-control"  name="first_name" value="{{ $admin->first_name }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Last Name*</label>
                                <input type="text" class="form-control" id="example-text-input" name="last_name" value="{{ $admin->last_name }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Date of birth*</label>
                                <input type="date" class="form-control" id="example-text-input" name="dob" value="{{ $admin->dob }}">
                            </div>
                        </div>
                    </div>
                    <div class="row px-10 mt-10">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Gender*</label>
                                <select name="gender" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="male" {{ $admin->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $admin?->gender == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                @csrf
                                <button class="btn btn-hero btn-rounded btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    <style>
        .bg-light-grey{
            background-color: #e9ecef;
            opacity: 1;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice{
            background-color: #0f51bb;
        }
    </style>
    @push('extra-css')
        <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/select2/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/select2/select2-bootstrap.min.css')}}">
    @endpush
    @push('extra-js')
        <script src="{{ asset('assets/custom/js/plugins/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/customassets/js/pages/be_forms_plugins.js')}}"></script>
        <script>
            jQuery(function () {
                // Init page helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
                Codebase.helpers(['select2']);
            });
        </script>
    @endpush
</x-dashboard.template>
