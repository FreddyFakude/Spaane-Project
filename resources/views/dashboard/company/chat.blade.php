<x-dashboard.template>
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <!-- Page Content -->
    <div class="content mt-10" id="chat">
        <div class="block">

        </div>
        <!-- END Block Tabs Alternative Style -->

        <div class="col-md-12">
            <!-- Simple Wizard 2 -->
            <div class="js-wizard-simple block">
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#wizard-simple2-step1" data-toggle="tab">1. Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-simple2-step2" data-toggle="tab">2. Edit Profile</a>
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

                <!-- Form -->
                <div class="block-content block-content-full tab-content" style="min-height: 267px;">
                    <!-- Step 1 -->
                    <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="block block-rounded block-themed">
                                    <!-- Chat Header -->
                                    <div class="js-chat-head block-content block-content-full block-sticky-options bg-gd-sea text-center">
                                        <img class="img-avatar img-avatar-thumb" src="{{ asset('assets/custom/media/avatars/avatar1.jpg') }}" alt="">
                                        <div class="font-w600 mt-15 mb-5 text-white">
                                            {{ $employee->first_name  }} {{ $employee->last_name  }} <br><span class="font-italic text-white-op">{{ $employee->role }}</span>
                                        </div>
                                    </div>
                                    <!-- END Chat Header -->

                                    <!-- Messages (demonstration messages are added with JS code at the bottom of this page) -->
                                    <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto" data-chat-id="4" style="height: 296px;">
                                        <template v-for="message in messages" v-if="message.is_outbound">
                                            <div class="font-size-sm font-italic text-muted text-center mt-20 mb-10">@{{ momentHumanReadable(message.created_at) }}</div>
                                            <div class="rounded font-w600 p-10 mb-10 animated fadeIn mr-50 bg-body-light">@{{ message.message }}</div>
                                        </template>
                                        <template v-else>
                                            <div class="font-size-sm font-italic text-muted text-center mt-20 mb-10">@{{ momentHumanReadable(message.created_at) }}</div>
                                            <div class="rounded font-w600 p-10 mb-10 animated fadeIn ml-50 bg-primary-lighter text-primary-darker">@{{ message.message }}</div>
                                        </template>
                                    </div>

                                    <!-- Chat Input -->
                                    <div class="js-chat-form block-content block-content-full block-content-sm bg-body-light">
                                        <form action="#" method="post"  @submit.prevent="sendMessage">
                                            <div class="d-flex">
                                                <input v-model="message" class="js-chat-input form-control" type="text" data-target-chat-id="4" placeholder="Type your message and hit enter..">
                                                <button class="btn btn-success" type="submit">Send</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Chat Input -->
                                    <div class="js-chat-form block-content block-content-full block-content-sm bg-body-light">
                                        <form action="#" method="post"  @submit.prevent="sendFile">
                                            <div class="d-flex">
                                                <input  class="js-chat-input form-control" type="file" data-target-chat-id="4" id="file" required>
                                                <button class="btn btn-success" type="submit">Send File</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END Chat Input -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <x-dashboard.employee-details :employee="$employee"></x-dashboard.employee-details>
                            </div>
                        </div>
                    </div>
                    <!-- END Step 1 -->

                    <!-- Step 2 -->
                    <div class="tab-pane" id="wizard-simple2-step2" role="tabpanel">
                        <div class="block-content">
                            <form action="{{ route('dashboard.business.employee.update', [$employee->hash]) }}" method="POST">
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
                                            <label class="pl-0" for="example-text-input">Gender</label>
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
                                            <input type="tel" class="form-control" id="example-text-input" disabled  name="mobile_number" value="{{ "0" . substr($employee->mobile_number, 2) }}">
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
                                            <input type="date" class="form-control"  name="employment_start_date" value="{{ $employee->professional_experience?->start_date }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
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
                                    <div class="col-md-2">
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="pl-0" for="example-text-input">Job Title</label>
                                            <input type="text" class="form-control" id="example-text-input" name="position" value="{{ $employee->professional_experience?->role }}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="pl-0" for="example-text-input">Organisation</label>
                                            <input type="text"  class="form-control"  name="organisation_name" value="{{ Auth::user()->company->name }}">
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
                                            <input type="text" class="form-control"  name="direct_manager">
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
                                        <h4>Remuneration</h4>
                                    </div>
                                </div>
                                <div class="row ml-3"><h6>Fixed Earnings:</h6></div>
                                <div class="row px-10 mt-5">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="pl-0" for="example-text-input"><small>Annual Basic salary</small></label>
                                            <input type="number" class="form-control"  name="basic_salary" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="pl-0" for="example-text-input"><small>Monthly Basic salary</small></label>
                                            <input type="number" class="form-control"  name="basic_salary" value="{{ $employee->remuneration?->basic_salary }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="pl-0" for="example-text-input"><small>Monthly Travel allowance</small></label>
                                            <input type="number" class="form-control" id="example-text-input" name="travel_allowance" value="{{ $employee->remuneration?->travel_allowance }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-10">
                                    <div class="col-md-3">
                                        <div class="form-group form-inline">
                                            <label class="pl-0" for="example-text-input"><small>Add other Earnings</small></label>
                                            <input type="text" class="form-control" id="example-text-input" placeholder="Enter name of earning/allowance" name="" value="">
                                            <button class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ml-3 mt-10 mb-0"><h6>Fixed Deductions:</h6></div>
                                <div class="row px-10">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="pl-0" for="example-text-input"><small>Medical Aid</small></label>
                                            <input type="number" class="form-control"  name="" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-10">
                                    <div class="col-md-3">
                                        <div class="form-group form-inline">
                                            <label class="pl-0" for="example-text-input"><small>Add other Deductions</small></label>
                                            <input type="text" class="form-control" id="example-text-input" placeholder="Enter name of deduction" name="" value="">
                                            <button class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ml-3 mt-10 mb-0"><h6>Fixed Tax:</h6></div>
                                <div class="row px-10">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="pl-0" for="example-text-input"><small>PAYE</small></label>
                                            <input type="number" class="form-control"  name="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="pl-0" for="example-text-input"><small>UIF</small></label>
                                            <input type="number" class="form-control"  name="" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-10">
                                    <div class="col-md-3">
                                        <div class="form-group form-inline">
                                            <label class="pl-0" for="example-text-input"><small>Add other Tax</small></label>
                                            <input type="text" class="form-control" id="example-text-input" placeholder="Enter name of Tax" name="" value="">
                                            <button class="btn btn-primary">Add</button>
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
                                            <button class="btn btn-primary">Update</button>
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
    @push('extra-js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment-with-locales.min.js" integrity="sha512-vFABRuf5oGUaztndx4KoAEUVQnOvAIFs59y4tO0DILGWhQiFnFHiR+ZJfxLDyJlXgeut9Z07Svuvm+1Jv89w5g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            new Vue({
                el: '#chat',
                data: {
                    chat: '',
                    messages: '',
                    message: ''
                },
                created(){
                    // this.messages = this.chat.messages;
                    var vm = this
                    setInterval(()=>{
                        axios.get("{{ route('dashboard.company.chat.employee.messages', [$chat->hash]) }}", {
                            chat_hash: vm.chatHash
                        }).then(response => {
                            vm.messages = response.data;
                            vm.initialState = false;
                        })
                    }, 5000)
                },
                methods: {
                    sendMessage: function ($event) {
                        var vm = this;
                        if(this.message.length > 0){
                            axios.post("{{ route('dashboard.company.chat.send.messages', [$chat->hash]) }}", {
                                chat_hash: "{{ $chat->hash }}",
                                message: vm.message
                            }).then(response => {
                                vm.messages = response.data;
                                vm.message = '';
                            })
                        }
                    },
                    momentHumanReadable(date) {
                        return moment(date).fromNow();
                    },
                    sendFile: function ($event) {
                        var vm = this;
                        const formData = new FormData();
                        const imagefile = document.querySelector('#file');
                        formData.append("file", imagefile.files[0]);
                        formData.append("chat_hash", "{{ $chat->hash }}");
                        formData.append("message", "File attachment");
                        axios.post("{{ route('dashboard.company.chat.send.messages', [$chat->hash]) }}", formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }).then(response => {
                            vm.messages = response.data;
                            document.querySelector('#file').value = '';
                        })
                    },
                }
            })
        </script>

        <script src="{{ asset('assets/custom/js/plugins/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/customassets/js/pages/be_forms_plugins.js')}}"></script>
        <script>
            jQuery(function () {
                // Init page helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
                Codebase.helpers(['select2']);
            });
        </script>
    @endpush
    @push('extra-css')
        <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/select2/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/select2/select2-bootstrap.min.css')}}">
    @endpush
</x-dashboard.template>
