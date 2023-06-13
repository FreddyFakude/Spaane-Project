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
                <form action="{{ route('dashboard.company.update.profile') }}" method="POST">
                    <div class="d-flex justify-content-start mt-20">
                        <div>
                            <h4>Company information</h4>
                        </div>
                    </div>
                    <div class="row px-10 mt-30">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Company Name</label>
                                <input type="text" class="form-control"  name="company_name" value="{{ $company?->name }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Company Address</label>
                                <input type="text" class="form-control"  name="head_office_name" value="{{ $company?->head_office_name }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Company Size
                                    <select name="company_size" id="" class="form-control">
                                       @foreach(\App\Models\Company::size as $size)
                                            <option value="{{ $size }}" {{ $company?->company_size == $size ? 'selected' : '' }}>{{ $size }}</option>
                                       @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Date company started operatinng</label>
                                <input type="date" class="form-control" id="example-text-input" name="date_creation" value="{{ $company->date_creation }}">
                            </div>
                        </div>
                    </div>
                    <div class="row px-10 mt-30">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Company registration number (if available)</label>
                                <input type="text" class="form-control"  name="registration_number" value="{{ $company->registration_number }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">What does your company do</label>
                                <textarea  class="form-control"  name="short_description">
                                    {{ $company?->short_description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Company financial year end*</label>
                                <input type="date" class="form-control" id="example-text-input" name="fiscal_year_start" value="{{ $company->fiscal_year_start }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Company Phone number*</label>
                                <input type="tel" class="form-control"  name="company_phone_number" value="{{ $company?->phone_number }}" placeholder="0788129192">
                            </div>
                        </div>
                    </div>
                    <div class="row px-10 mt-30">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input"></label>
                                <br>
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
