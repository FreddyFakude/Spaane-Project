<x-dashboard.template>
    <!-- Page Content -->
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <div class="content">
        <div class="row py-20">
            {{--            <div class="col-md-4 col-xl-4">--}}
            {{--                <div class="block">--}}
            {{--                    <ul class="nav nav-tabs shadow justify-content-around bg-light nav-tabs-block js-tabs p-10 mb-10" data-toggle="tabs" role="tablist" style="border-radius: 8px">--}}
            {{--                        <li class="nav-item">--}}
            {{--                            <a class="btn btn-light bg-white" href="#btabs-internal">My employees</a>--}}
            {{--                        </li>--}}
            {{--                        <li class="nav-item">--}}
            {{--                            <a class="btn btn-light bg-white"  href="#btabs-external">External employee</a>--}}
            {{--                        </li>--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="col-md-12 col-xl-12">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-lg btn-primary mr-2" data-toggle="modal" data-target="#modal-slideright">Create payslip</button>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="block-header">
                @if(session()->has('payslip-added'))
                    <div class="alert alert-success alert-dismissable w-100" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                        <p class="mb-0">Payslip created successfully</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="block-content tab-content">
                <table class="table table-striped table-vcenter active js-table-checkable js-table-checkable-enabled tab-pane" id="btabs-internal">
                    <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Reference</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Basic Salary</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Commission</th>
                    </tr>
                    </thead>
                    <tbody>
                    @empty(!$payslips)
                        @foreach($payslips as $payslip)
                            <tr>
                                <td>
                                    <p class="font-w600 mb-10">
                                        {{ $payslip->employee->name }}
                                    </p>
                                </td>
                                <td>
                                    <p class="font-w600 mb-10">
                                        <a href="{{ route('dashboard.business.payroll.show', [$payslip->hash]) }}">{{ $payslip->reference_number }}</a>
                                    </p>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="text-muted">{{ $payslip->basic_salary }}</em>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="text-muted">  {{ $payslip->commission }} </em>
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
                    {{--                    @foreach($employees as $project)--}}
                    {{--                        @if($project->status > 0)--}}
                    {{--                            <tr>--}}
                    {{--                                <td class="text-center">--}}
                    {{--                                    <label class="css-control css-control-primary css-checkbox">--}}
                    {{--                                        <input type="checkbox" class="css-control-input" id="row_1" name="row_1">--}}
                    {{--                                        <span class="css-control-indicator"></span>--}}
                    {{--                                    </label>--}}
                    {{--                                </td>--}}
                    {{--                                <td>--}}
                    {{--                                    <p class="font-w600 mb-10">{{ $project->talent->name }}</p>--}}
                    {{--                                </td>--}}
                    {{--                                <td class="d-none d-sm-table-cell">--}}
                    {{--                                    <em class="text-muted">{{ $project->talent->role }}</em>--}}
                    {{--                                </td>--}}
                    {{--                                <td class="d-none d-sm-table-cell" style="width: 20%;">--}}
                    {{--                                    <a href="{{ route('dashboard.business.view-talent', [$project->talent->id]) }}" class="btn-primary btn">View employee</a>--}}
                    {{--                                </td>--}}
                    {{--                            </tr>--}}
                    {{--                        @endif--}}
                    {{--                    @endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <!-- Slide Right Modal -->
    <div class="modal fade" id="modal-slideright" tabindex="-1" role="dialog" aria-labelledby="modal-slideright" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideright modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('dashboard.business.payroll.store')  }}" method="post">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-content">
                            <div class="d-flex justify-content-center my-20">
                                <div class="mb-20">
                                    <h2>Payslip</h2>
                                </div>
                            </div>
                            <div class="row px-10 mt-30">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="pl-0" for="example-text-input">Basic Salary</label>
                                        <input type="number" class="form-control bg-grey"  name="basic_salary">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="pl-0" for="example-text-input">Commission(amount)</label>
                                        <input type="number" class="form-control" id="example-text-input" name="commission">
                                    </div>
                                </div>
                            </div>
                            <div class="row px-10">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="pl-0" for="example-text-input">Reimbursement</label>
                                        <input type="number" class="form-control bg-grey" id="example-text-input" name="reimbursement">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-12 pl-0" for="example-text-input">Travel Allowance</label>
                                        <input type="number" class="form-control" id="example-text-input" name="travel_allowance">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-12 pl-0" for="example-text-input">Employee</label>
                                        <select class="form-control" name="employee_id">
                                            <option value="">Select Employee</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                           </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        @csrf
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Slide Right Modal -->

</x-dashboard.template>
