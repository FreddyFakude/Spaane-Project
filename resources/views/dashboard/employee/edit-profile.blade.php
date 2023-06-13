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
                <form action="{{ route('dashboard.talent.profile.save') }}" method="POST">
                    <div class="d-flex justify-content-start mt-20">
                        <div>
                            <h4>Personal information</h4>
                        </div>
                    </div>
                    <div class="row px-10 mt-30">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">First Name</label>
                                <input type="text" class="form-control"  name="first_name" value="{{ $talent->first_name }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Last Name</label>
                                <input type="text" class="form-control" id="example-text-input" name="last_name" value="{{ $talent->last_name }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Date of birth</label>
                                <input type="date" class="form-control" id="example-text-input" name="dob" value="{{ $talent->dob  }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Nationality</label>
                                <input type="text" class="form-control" id="example-text-input" name="nationality" value="{{ $talent->nationality  }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row px-10 mt-10">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">ID/Passport Number</label>
                                <input type="text" class="form-control"  name="id_or_passport" value="{{ $talent->id_or_passport  }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Gender</label>
                                <select name="gender" id="" class="form-control">
                                    <option value="{{ $talent->gender  }}">{{ $talent->gender  }}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Marital status</label>
                                <select name="marital_status" id="" class="form-control">
                                    <option value="{{ $talent->marital_status  }}">{{ $talent->marital_status  }}</option>
                                    <option value="Single">Single</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Married">Married</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Emergency Cell Phone Number</label>
                                <input type="tel" class="form-control"  name="emergency_phone_number" value="{{ $talent->emergency_phone_number }}">
                            </div>
                        </div>
                    </div>
                    <div class="row px-10 mt-10">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Children</label>
                                <input type="text" class="form-control"  name="number_of_children" value="{{ $talent->number_of_children }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Cell Phone Number</label>
                                <input type="tel" class="form-control" id="example-text-input" name="mobile_number" value="{{ "0" . substr($talent->mobile_number, 2) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Home Phone number</label>
                                <input type="tel" class="form-control" id="example-text-input" name="home_phone_number" value="{{ $talent->home_phone_number }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Personal Email</label>
                                <input type="email" class="form-control" id="example-text-input" name="personal_email" value="{{ $talent->personal_email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row px-10 mt-10">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Street Number</label>
                                <input type="text" class="form-control" id="example-text-input" name="street_number" value="{{ $talent->address?->street_number }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Street name</label>
                                <input type="text" class="form-control" id="example-text-input" name="street_name" value="{{ $talent->address?->street_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Suburb</label>
                                <input type="text" class="form-control" id="example-text-input" name="suburb" value="{{ $talent->address?->suburb }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">City/Town</label>
                                <input type="text" class="form-control" id="example-text-input" value="{{ $talent->address?->city }}" name="city" required>
                            </div>
                        </div>
                    </div>
                    <div class="row px-10 mt-10">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Zip Code</label>
                                <input type="text" class="form-control" id="example-text-input" name="zip_code" value="{{ $talent->address?->zip_code }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Province/State</label>
                                <input type="text" class="form-control" id="example-text-input" name="state" value="{{ $talent->address?->state }}">
                            </div>
                        </div>
                    </div>
                    <div class="my-30">
                        <hr>
                    </div>
                    <div class="d-flex justify-content-start mt-20">
                        <div>
                            <h4>Banking Details</h4>
                        </div>
                    </div>
                    <div class="row px-10 mt-30">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Bank Name</label>
                                <input type="text" class="form-control"  name="bank_name" value="{{ $talent->bankAccount?->bank_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Account Type Name</label>
                                <input type="text" class="form-control"  name="account_type" value="{{ $talent->bankAccount?->account_type }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Branch code</label>
                                <input type="text" class="form-control"  name="branch_code" value="{{ $talent->bankAccount?->branch_code }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input"> Account Number</label>
                                <input type="text" class="form-control"  name="account_number" value="{{ $talent->bankAccount?->account_number }}">
                            </div>
                        </div>
                    </div>

                    <div class="my-30">
                        <hr>
                    </div>
                    <div class="d-flex justify-content-start mt-20">
                        <div>
                            <h4>Employment</h4>
                        </div>
                    </div>
                    <div class="row px-10 mt-30">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Start Date</label>
                                <input type="date" class="form-control"  name="employment_start_date" value="{{ $talent->professional_experience?->start_date }}" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="pl-0">Department</label>
                                <select class="form-control"   name="department_id" required>
                                    <option value="0">Choose Department</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" @selected($talent->department->id == $department->id)>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Contract Type</label>
                                <select class="form-control"  name="type" required>
                                    <option value="">Choose contract type</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach(\App\Models\Employee::ContractType as $contract)
                                        <option value="{{ $contract }}" @selected($talent->type == $contract)>{{ $contract }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Job Title</label>
                                <input type="text" class="form-control" id="example-text-input" name="position" value="{{ $talent->professional_experience?->role }}">
                            </div>
                        </div>
                        {{-- <div class="col-md-2">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Organisation</label>
                                <input type="date" class="form-control"  name="organisation_name" value="{{ $talent->professional_experience?->organisation_name }}" required>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row px-10 mt-30">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Work Email</label>
                                <input type="email" class="form-control" id="example-text-input" name="work_email" value="{{ $talent->email }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Work Number</label>
                                <input type="text" class="form-control"  name="office_phone_number" value="{{ $talent->office_phone_number }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Employee Tax Number</label>
                                <input type="text" class="form-control" id="example-text-input" name="tax_number" value="{{ $talent->tax_number }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Driving License Number</label>
                                <input type="text" class="form-control" id="example-text-input" name="driving_license_number" value="{{ $talent->driving_license_number }}">
                            </div>
                        </div>
                    </div>
                    <div class="my-30">
                        <hr>
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
                                <input type="text" class="form-control"  name="direct_manager" value="{{ $talent->direct_manager }}">
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
                    <div class="d-flex justify-content-start mt-20">
                        <div>
                            <h4>Education/Training</h4>
                        </div>
                    </div>
                    <div class="row px-10 mt-30">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Qualification/Certification</label>
                                <input type="text" class="form-control"  name="qualification" value="{{ $talent->education?->qualification }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="pl-0" for="example-text-input">Completion Date</label>
                                <input type="date" class="form-control" id="example-text-input" name="qualification_end_date" value="{{ $talent->education?->qualification_end_date }}">
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
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
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
