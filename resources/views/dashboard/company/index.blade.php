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

                <!-- Form -->
                <form action="be_forms_wizard.html" method="post">
                    <!-- Steps Content -->
                    <div class="block-content block-content-full tab-content" style="min-height: 267px;">
                        <!-- Step 1 -->
                        <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">
                            <div class="col-md-10">
                                <!-- Info Alert -->
                                <div class="alert alert-info alert-dismissable" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div><h3 class="badge badge-warning">Annual Leave Request</h3></div>
                                    <p class="mb-10">Remmone (Developer) requested 3 work days from 12 Apr to 15 Apr <button class="btn btn-alt-success ml-10">Accept</button><button class="btn btn-alt-danger ml-10">Decline</button></p>
                                    <small class="mb-0">Leave Balance:</small>
                                    <span class="badge badge-warning">Annnual - 10 days</span>
                                    <span class="badge badge-primary">Maternity - 4 months</span>
                                    <span class="badge badge-info">Sick - 8 days</span>
                                    <span class="badge badge-danger">Study - 8 days</span>
                                    <span class="badge badge-success">Family responsibility - 4 days</span>
                                    <span class="badge badge-secondary">Religious - 4 days</span>
                                </div>
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
                                                    <em class="text-muted"> Enngineering </em>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <em class="text-muted"> Permenant</em>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <em class="">
                                                        @foreach($employee->initialLeaveTypeDays as $initialLeaveDay)
                                                            <span class="badge badge-warning">{{ $initialLeaveDay->leave_type }} {{ (new App\Services\LeaveCalculation())->calculateRemainingDaysOnLeaveType($employee, $initialLeaveDay)  }}</span>
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
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <select class="js-select2 form-control" id="example-select2" name="example-select2" style="width: 100%;" data-placeholder="Choose leave policy">
                                                                <option value="0">Choose Policy Leave</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                <option value="1">Annual leave</option>
                                                                <option value="2">Maternity leave</option>
                                                                <option value="3">Sick leave</option>
                                                                <option value="4">Study leave</option>
                                                                <option value="5">Religious leave</option>
                                                                <option value="6">Family Responsibility leave</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- <form class="task_setup" method="POST" action="{{ route('dashboard.company.employee.update.leave', [$employee->id]) }}" enctype="multipart/form-data"> --}}
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <div class="input-daterange input-group" data-date-format="mm/dd/yyyy" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                                                                    <input type="date" class="form-control" id="example-daterange1" name="example-daterange1" placeholder="From" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                                                                    <div class="input-group-prepend input-group-append">
                                                                        <span class="input-group-text font-w600">to</span>
                                                                    </div>
                                                                    <input type="date" class="form-control mr-10" id="example-daterange2" name="example-daterange2" placeholder="To" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-alt-success ml-0" ><i class="fa fa-check"></i> Submit</button>
                                                                </div>
                                                            </div>

                                                        </div>

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
                                <form id="js-task-form" action="be_pages_generic_todo.html" method="post">
                                    <div class="input-group input-group-lg">
                                        <input class="form-control mr-5" type="text" id="js-task-input" name="js-task-input" placeholder="Add leave policy">
                                        <input class="form-control mr-5" type="nunmber" id="js-task-input" name="js-task-input" placeholder="Add permitted no of days">
                                        <p class="mr-15"> days per year</p>
                                        <button class="btn btn-md btn-alt-success" type="button">
                                            Add
                                        </button>
                                    </div>
                                </form>
                                 <!-- Leave  Policy List -->
                                <div class="js-task-list mt-20">
                                    <!-- Policy -->
                                    <div class="js-task block block-rounded mb-5 animated fadeIn" data-task-id="9" data-task-completed="false" data-task-starred="false">
                                        <table class="table table-borderless table-vcenter mb-0">
                                            <tr class="block block-rounded block-bordered">
                                                <div>
                                                <td class="js-task-content font-w600">
                                                    Annual Leave <br><small>18 days per year</small>
                                                </td>
                                                <td class="text-right" style="width: 100px;">
                                                    <button class="js-task-remove btn btn-sm btn-alt-danger" type="button">
                                                        Remove
                                                    </button>
                                                </td>
                                                </div>
                                            </tr>
                                            <tr class="block block-rounded block-bordered">
                                                <td class="js-task-content font-w600">
                                                    Sick Leave <br><small> 15 days per year</small>
                                                </td>
                                                <td class="text-right" style="width: 100px;">
                                                    <button class="js-task-remove btn btn-sm btn-alt-danger" type="button">
                                                        Remove
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="block block-rounded block-bordered">
                                                <td class="js-task-content font-w600">
                                                    Materninty Leave <br><small> 4 months per year</small>
                                                </td>
                                                <td class="text-right" style="width: 100px;">
                                                    <button class="js-task-remove btn btn-sm btn-alt-danger" type="button">
                                                        Remove
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="block block-rounded block-bordered">
                                                <td class="js-task-content font-w600">
                                                    Family Responsibility Leave <br><small>3 days per year</small>
                                                </td>
                                                <td class="text-right" style="width: 100px;">
                                                    <button class="js-task-remove btn btn-sm btn-alt-danger" type="button">
                                                        Remove
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="block block-rounded block-bordered">
                                                <td class="js-task-content font-w600">
                                                    Study Leave <br><small>12 months per year</small>
                                                </td>
                                                <td class="text-right" style="width: 100px;">
                                                    <button class="js-task-remove btn btn-sm btn-alt-danger" type="button">
                                                        Remove
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="block block-rounded block-bordered">
                                                <td class="js-task-content font-w600">
                                                    Religious Leave <br><small>7 days per 1 year</small>
                                                </td>
                                                <td class="text-right" style="width: 100px;">
                                                    <button class="js-task-remove btn btn-sm btn-alt-danger" type="button">
                                                        Remove
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- END Leave Policy -->
                                </div>
                            </div>
                        </div>
                        <!-- END Step 3 -->
                    </div>
                    <!-- END Steps Content -->
                </form>
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
