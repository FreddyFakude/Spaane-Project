<x-dashboard.template>
    <!-- Page Content -->
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <div class="content">
        <div class="row">
            <div class="col-md-9 offset-md-2">
                @if(session()->has('talent-updated'))
                    <div class="alert alert-success w-75 ">Leave updated</div>
                @endisset
                {{-- <h3>Current Leave days {{ $employee->current_leave_days}}</h3> --}}
                @error('leave_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- Block Tabs Alternative Style -->
        <div class="block">

        </div>
        <!-- END Block Tabs Alternative Style -->

        <div class="col-md-12">
            <!-- Simple Wizard 2 -->
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="js-wizard-simple block">
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#wizard-simple2-step1" data-toggle="tab">1. Leave Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-simple2-step2" data-toggle="tab">2. Manual Submissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-simple2-step3" data-toggle="tab">3. Leave Policy Setup</a>
                    </li>
                </ul>
                <!-- END Step Tabs -->

                <div class="block-content block-content-full tab-content" style="min-height: 267px;">
                    <!-- Step 1 -->
                    <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">
                        <div class="col-md-10">
                            <!-- Info Alert -->
                           @foreach($employees as $employee)
                                @foreach($employee->leaveRequests as $request)
                                    <div class="alert alert-info alert-dismissable" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div><span>Annual Leave Request</span></div>
                                        <p class="mb-10">
                                            {{ $employee->name }} ({{ $employee->role }}) requested {{ $request->total_days }} work days from {{ $request->start_date }}  to {{ $request->end_date }}
                                            @if($request->status == \App\Models\EmployeeLeaveRequest::STATUS['review'])
                                                <a class="btn btn-alt-success ml-10" href="{{ route('dashboard.company.employee.approve.leave', [$employee->hash, $request->hash]) }}">Accept</a>
{{--                                                <button class="btn btn-alt-danger ml-10" href="{{ route() }}">Decline</button>--}}
                                            @endif
                                        </p>
                                        <small class="mb-0">Leave Balance:</small>
                                        @foreach($employee->leavePolicies as $policy)
                                            <span>{{ $policy->leaveType->name }} {{ (new App\Services\LeaveCalculation())->calculateRemainingDaysOnLeaveType($employee, $policy->initialDay)  }}</span>
                                        @endforeach
{{--                                        <span class="badge badge-warning">Annnual - 10 days</span>--}}
{{--                                        <span class="badge badge-primary">Maternity - 4 months</span>--}}
{{--                                        <span class="badge badge-info">Sick - 8 days</span>--}}
{{--                                        <span class="badge badge-danger">Study - 8 days</span>--}}
{{--                                        <span class="badge badge-success">Family responsibility - 4 days</span>--}}
{{--                                        <span class="badge badge-secondary">Religious - 4 days</span>--}}
                                    </div>
                                @endforeach
                            @endforeach
                            <!-- END Info Alert -->
                        </div>
                    </div>
                    <!-- END Step 1 -->

                    <!-- Step 2 -->
                    <div class="tab-pane" id="wizard-simple2-step2" role="tabpanel">
                        <div class="block-content tab-content">
                            <table class="table table-striped table-vcenter active js-table-checkable js-table-checkable-enabled tab-pane" id="btabs-internal">
                                <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th class="d-none d-sm-table-cell" style="width: 10%;">Job title</th>
                                    <th class="d-none d-sm-table-cell" style="width: 10%;">Department</th>
                                    <th class="d-none d-sm-table-cell" style="width: 10%;">Job type</th>
                                    <th class="d-none d-sm-table-cell" style="width: 10%;">Leave balance</th>
                                    <th class="d-none d-sm-table-cell" style="width: 60%;">Add leave</th>
                                    <th class="d-none d-sm-table-cell" style="width: 5%;">Chat</th>
                                </tr>
                                </thead>
                                <tbody>
                                @empty(!$employees)
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>
                                                <p class="font-w600 mb-10">
                                                    <a href="{{ route('dashboard.company.employee.view', [$employee]) }}">{{ $employee->name }}</a>
                                                </p>
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <em class="text-muted">{{ $employee->role }}</em>
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <em class="text-muted">{{ $employee->department->name }} </em>
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <em class="text-muted">{{ $employee->type  }}</em>
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <em class="">
                                                    @foreach($employee->leavePolicies as $policy)
                                                        <span class="badge badge-warning">{{ $policy->leaveType->name }} {{ (new App\Services\LeaveCalculation())->calculateRemainingDaysOnLeaveType($employee, $policy->initialDay)  }}</span>
                                                    @endforeach
                                                </em>
                                                {{--                                                    <em class="">--}}
                                                {{--                                                        <span class="badge badge-warning">Annnual - 10 days</span>--}}
                                                {{--                                                        <span class="badge badge-primary">Maternity - 4 months</span>--}}
                                                {{--                                                        <span class="badge badge-info">Sick - 8 days</span>--}}
                                                {{--                                                        <span class="badge badge-danger">Study - 8 days</span>--}}
                                                {{--                                                        <span class="badge badge-success">Family responsibility - 4 days</span>--}}
                                                {{--                                                        <span class="badge badge-secondary">Religious - 4 days</span>--}}
                                                {{--                                                    </em>--}}
                                            </td>
                                            <td class="d-none d-sm-table-cell" style="width: 60%;">
                                                <form action="{{ route('dashboard.company.employee.leave.manual-request', [$employee->hash]) }}" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <select class="js-select2 form-control" id="example-select2" name="employee_leave_policy_id" style="width: 100%;" data-placeholder="Choose leave policy" required>
                                                            <option>Choose leave policy</option>
                                                            @foreach($employee->leavePolicies as $policy)
                                                                <option value="{{ $policy->id }}">{{ $policy->leaveType->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- <form class="task_setup" method="POST" action="{{ route('dashboard.company.employee.update.leave', [$employee->id]) }}" enctype="multipart/form-data"> --}}
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                            <div class="input-daterange input-group" data-date-format="mm/dd/yyyy" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                                                                <input type="date" class="form-control" id="example-daterange1" name="start_date" placeholder="From" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                                                                <div class="input-group-prepend input-group-append">
                                                                    <span class="input-group-text font-w600">to</span>
                                                                </div>
                                                                <input type="date" class="form-control mr-10" id="example-daterange2" name="end_date" placeholder="To" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                                                                @csrf
                                                                <button type="submit" class="btn btn-alt-success ml-0" ><i class="fa fa-check"></i> Submit</button>
                                                            </div>
                                                    </div>

                                                </div>
                                                </form>
                                                {{-- <input type="date" class="form-control" name="leave_date" value=""> --}}
                                                {{-- </form> --}}
                                            </td>
                                            <td class="d-none d-sm-table-cell" style="width: 5%;">
                                                <a href="{{ route('dashboard.company.chat.new', [$employee->id]) }}"><i class="si si-bubble fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endempty
                                </tbody>
                            </table>
                            <table class="js-table-checkable table table-hover js-table-checkable-enabled tab-pane" id="btabs-external">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 70px;">
                                        <label class="css-control css-control-primary css-checkbox py-0">
                                            <input type="checkbox" class="css-control-input" id="check-all" name="check-all">
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </th>
                                    <th>Employee</th>
                                    <th class="d-none d-sm-table-cell" style="width: 20%;">Role</th>
                                    <th class="d-none d-sm-table-cell" style="width: 20%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Step 2 -->

                    <!-- Step 3 -->
                    <div class="tab-pane" id="wizard-simple2-step3" role="tabpanel">
                        <div class="js-tasks col-md-8">
                            <!-- Add Leave Policy-->
                            <form id="js-task-form" action="{{ route('dashboard.company.employee.add.leave-policy', [$employee->hash]) }}" method="post">
                                <div class="input-group input-group-lg">
                                    <select class="form-control-lg mr" v-model="leave_policy" @change="update" name="leave_policy[company_leave_policy_id]" required>
                                        <option value="">Choose Policy Leave</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($companyLeavePolicy as $leave)
                                            <option value="{{ $leave->id }}">{{ $leave->leaveType->name }}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @endforeach
                                    </select>
                                    {{--                                        <input class="form-control mr-5" type="text" id="js-task-input" name="js-task-input" placeholder="Add leave policy">--}}
                                    <input class="form-control mr-5" v-model="leave_policy_days" type="number" id="leave_policy_days" name="leave_policy[days]" placeholder="Add permitted no of days">
                                    {{--                                        <input class="form-control mr-5" v-model="leave_policy_type_id" type="hidden" id="leave_policy_type_id" name="leave_policy[leave_type_id]">--}}
                                    @csrf
                                    <p class="mr-15">Days per year</p>
                                    <button class="btn btn-md btn-alt-success" type="submit">
                                        Add
                                    </button>
                                </div>
                            </form>
                            <!-- Leave  Policy List -->
                            <div class="js-task-list mt-20">
                                <!-- Policy -->
                                <div class="js-task block block-rounded mb-5 animated fadeIn" data-task-id="9" data-task-completed="false" data-task-starred="false">
                                    <table class="table table-borderless table-vcenter mb-0">
                                        @foreach($employee->leavePolicies as $initialDays)
                                            <tr class="block block-rounded block-bordered">
                                                <div>
                                                    <td class="js-task-content font-w600">
                                                        {{ $initialDays->leaveType->name }} <br><small>{{ $initialDays->days }} days per year</small>
                                                    </td>
                                                    <td class="text-right" style="width: 100px;">
                                                        <button class="js-task-remove btn btn-sm btn-alt-danger" type="button">
                                                            Remove
                                                        </button>
                                                    </td>
                                                </div>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <!-- END Leave Policy -->
                            </div>
                        </div>
                    </div>
                    <!-- END Step 3 -->
                </div>
                <!-- END Form -->
            </div>
            <!-- END Simple Wizard 2 -->
        </div>
    </div>
    @push('extra-css')
        <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">
    @endpush
<!-- END Page Content -->
    @push('extra-js')
        <script src="https://unpkg.com/js-datepicker"></script>
        <script>
            function showModal(id){
                document.querySelector('#talent_id').value = id;
                jQuery('#modal-slideright').modal('show');
            }
            const picker = datepicker(document.querySelector('#calendar'), {
                alwaysShow: true,noWeekends: true,
                events: [
                    new Date()
                ],
                formatter: (input, date, instance) => {
                    input.value = moment(date).format('YYYY-MM-DD') // => '1/1/2099'
                }
            })
        </script>
        <script src="{{ asset('assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
        <script src="assets/js/pages/be_forms_wizard.js"></script>
        <script>
            Vue({
                el: '#app',
                data() {
                    return {
                        leave_policy: '',
                        leave_policy_type_id: '',
                        leave_policy_days: '',
                    }
                },
                methods: {
                    update() {
                        this.leave_policy_type_id = this.leave_policy;
                    }
                }
            })
        </script>
    @endpush
    <style>
        .qs-datepicker-container{
            position: relative;
        }
        .tb-form-control .input-group-text{
            height: 53px;
        }
        .tb-form-control .form-control-lg{
            height: 53px;
            background-color: #c6c6c6;
        }
        .tb-form-control .input-group-prepend{
            margin-left: -5px;
        }
        .tb-form-control .input-group-text{
            background-color: #c6c6c6;
        }
    </style>
</x-dashboard.template>
