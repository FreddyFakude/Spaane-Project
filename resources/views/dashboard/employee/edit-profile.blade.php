<x-dashboard.template>
    <!-- Page Content -->
    <x-slot name="sidemenu">
        <x-dashboard.employee.sidemenu></x-dashboard.employee.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.employee.header></x-dashboard.employee.header>
    </x-slot>
    <div class="content bg-light">
        <div class="block">
            <div class="block-header block-header-default">
                @if(session()->has('talent-added'))
                    <div class="alert alert-success alert-dismissable w-100" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                        <p class="mb-0">Your invite has been sent</p>
                    </div>
                @endif
                @if(session()->has('talent-profile-updated'))
                    <div class="alert alert-success alert-dismissable w-100" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                        <p class="mb-0">Your profile has been updated</p>
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
                <div class="col-md-12">
                    <!-- Simple Wizard 2 -->
                    <div class="js-wizard-simple block">
                        <!-- Step Tabs -->
                        <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="#wizard-simple2-step2" data-toggle="tab">2. Personal details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#wizard-simple2-step4" data-toggle="tab">4. Education and employment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#wizard-simple2-step6" data-toggle="tab">4. Banking details</a>
                            </li>
                        </ul>
                        <!-- END Step Tabs -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <!-- Form -->
                        <div class="block-content block-content-full tab-content" style="min-height: 267px;">
                            <!-- Step 2 -->
                            <div class="tab-pane active" id="wizard-simple2-step2" role="tabpanel">
                                <div class="block-content">
                                    <form action="{{ route('dashboard.employee.profile.update_personal_details', [$employee->hash]) }}" method="POST">
                                        <div class="d-flex justify-content-start mt-20">
                                            <div>
                                                <h4>Personal information</h4>
                                            </div>
                                        </div>
                                        <div class="row px-10 mt-30">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">First Name</label>
                                                    <input type="text" class="form-control"  name="first_name" value="{{ $employee->first_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Last Name</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="last_name" value="{{ $employee->last_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Date of birth</label>
                                                    <input type="date" class="form-control" id="example-text-input" name="dob" value="{{ $employee->dob  }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Nationality</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="nationality" value="{{ $employee->nationality  }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-10 mt-10">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">ID/Passport Number</label>
                                                    <input type="text" class="form-control"  name="id_or_passport" value="{{ $employee->id_or_passport  }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input" required>Gender</label>
                                                    <select name="gender" id="" class="form-control">
                                                        <option value="{{ $employee->gender  }}">{{ $employee->gender  }}</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Marital status</label>
                                                    <select name="marital_status" id="" class="form-control">
                                                        <option value="{{ $employee->marital_status  }}">{{ $employee->marital_status  }}</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Married">Married</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Emergency Cell Phone Number</label>
                                                    <input type="tel" class="form-control"  name="emergency_phone_number" value="{{ $employee->emergency_phone_number }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-10 mt-30">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Work Email</label>
                                                    <input type="email" class="form-control" id="example-text-input" name="work_email" value="{{ $employee->email }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Work Number</label>
                                                    <input type="text" class="form-control"  name="office_phone_number" value="{{ $employee->office_phone_number }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Employee Tax Number</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="tax_number" value="{{ $employee->tax_number }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Driving License Number</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="driving_license_number" value="{{ $employee->driving_license_number }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-10 mt-10">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Children</label>
                                                    <input type="text" class="form-control"  name="number_of_children" value="{{ $employee->number_of_children }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Cell Phone Number</label>
                                                    <input type="tel" class="form-control" id="example-text-input"  name="mobile_number" value="{{ "0" . substr($employee->mobile_number, 2) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Home Phone number</label>
                                                    <input type="tel" class="form-control" id="example-text-input" name="home_phone_number" value="{{ $employee->home_phone_number }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Personal Email</label>
                                                    <input type="email" class="form-control" id="example-text-input" name="personal_email" value="{{ $employee->personal_email }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-10 mt-10">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Street Number</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="street_number" value="{{ $employee->address?->street_number }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Street name</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="street_name" value="{{ $employee->address?->street_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Suburb</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="suburb" value="{{ $employee->address?->suburb }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">City</label>
                                                    <input type="text" class="form-control" id="example-text-input" value="{{ $employee->address?->city }}" name="city">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-10 mt-10">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Zip Code</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="zip_code" value="{{ $employee->address?->zip_code }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">State</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="state" value="{{ $employee->address?->state }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0">Department</label>
                                                    <select class="form-control"   name="department_id" required>
                                                        <option value="0">Choose Department</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        @foreach($departments as $department)
                                                            <option value="{{ $department->id }}" @selected($employee->department->id == $department->id)>{{ $department->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Contract Type</label>
                                                    <select class="form-control"  name="type" required>
                                                        <option value="">Choose contract type</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        @foreach(\App\Models\Employee::ContractType as $contract)
                                                            <option value="{{ $contract }}" @selected($employee->type == $contract)>{{ $contract }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-start mt-20">
                                            <div>
                                                <h4>Management</h4>
                                            </div>
                                        </div>
                                        <div class="row px-10 mt-30">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Direct Manager</label>
                                                    <input type="text" class="form-control"  name="direct_manager" value="{{ $employee->direct_manager }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Onboarding Mentor</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="onboarding_mentor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-30">
                                            <hr>
                                        </div>
                                        <div class="row px-10 mt-30">
                                            <div class="col-md-8">
                                                @csrf
                                                <div class="form-group">
                                                    <button class="btn btn-rounded btn-hero btn-success">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="tab-pane" id="wizard-simple2-step4" role="tabpanel">
                                <div class="block-content">
                                    <form action="{{ route('dashboard.employee.profile.update_education_employment', [$employee->hash]) }}" method="POST">
                                        <div class="my-30">
                                            <hr>
                                        </div>
                                        <div class="d-flex justify-content-start mt-20">
                                            <div>
                                                <h4>Employment</h4>
                                            </div>
                                        </div>
                                        <div class="row px-10 mt-30">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Organisation name</label>
                                                    <input type="text" class="form-control"  name="organisation_name" value="{{ $employee->professional_experience?->organisation_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Start Date</label>
                                                    <input type="date" class="form-control"  name="employment_start_date" value="{{ $employee->professional_experience?->start_date }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Contract Type</label>
                                                    <select class="form-control"  name="type">
                                                        <option value="">Choose contract type</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        @foreach(\App\Models\Employee::ContractType as $contract)
                                                            <option value="{{ $contract }}" @selected($employee->type == $contract)>{{ $contract }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Job Title</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="position" value="{{ $employee->professional_experience?->role }}">
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Organisation</label>
                                                    <input type="text"  class="form-control"  name="organisation_name" value="{{ Auth::user()->company->name }}">
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="my-30">
                                            <hr>
                                        </div>

                                        <div class="d-flex justify-content-start mt-20">
                                            <div>
                                                <h4>Education/Training</h4>
                                            </div>
                                        </div>
                                        <div class="row px-10 mt-30">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Qualification/Certification</label>
                                                    <input type="text" class="form-control"  name="qualification" value="{{ $employee->education?->qualification }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Completion Date</label>
                                                    <input type="date" class="form-control" id="example-text-input" name="qualification_end_date" value="{{ $employee->education?->qualification_end_date }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-30">
                                            <hr>
                                        </div>
                                        <div class="d-flex justify-content-start mt-20">
                                            <div>
                                                <h4>Skills/Tools</h4>
                                            </div>
                                        </div>
                                        <div class="row px-10 mt-30">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Skills and Tools You can use <small>(separate each skill with a comma ',')</small></label>
                                                    <div class="col-lg-8">
                                                        <select class="js-select2 form-control" id="example-select2-multiple" name="skills[]" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                            @foreach($skills as $skill)
                                                                <option value="{{ $skill->id }}" @if(in_array($skill->id, $selectedSkills)) selected @endif>{{ $skill->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-30">
                                            <hr>
                                        </div>
                                        <div class="row px-10 mt-30">
                                            <div class="col-md-8">
                                                @csrf
                                                <div class="form-group">
                                                    <button class="btn btn-rounded btn-hero btn-success">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="tab-pane" id="wizard-simple2-step6" role="tabpanel">
                                <div class="block-content">
                                    <form action="{{ route('dashboard.employee.profile.update_banking_details', [$employee->hash]) }}" method="POST">
                                        <div class="d-flex justify-content-start mt-20">
                                            <div>
                                                <h4>Banking Details</h4>
                                            </div>
                                        </div>
                                        <div class="row px-10 mt-30">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Bank Name</label>
                                                    <input type="text" class="form-control"  name="bank_name" value="{{ $employee->bankAccount?->bank_name }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Account Type Name</label>
                                                    <input type="text" class="form-control"  name="account_type" value="{{ $employee->bankAccount?->account_type }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input">Branch code</label>
                                                    <input type="text" class="form-control"  name="branch_code" value="{{ $employee->bankAccount?->branch_code }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="pl-0" for="example-text-input"> Account Number</label>
                                                    <input type="text" class="form-control"  name="account_number" value="{{ $employee->bankAccount?->account_number }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-10 mt-30">
                                            <div class="col-md-8">
                                                @csrf
                                                <div class="form-group">
                                                    <button class="btn btn-rounded btn-hero btn-success">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- END Step 2 -->
                        </div>

                        <!-- END Form -->
                    </div>
                    <!-- END Simple Wizard 2 -->
                </div>
            </div>
        </div>
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
