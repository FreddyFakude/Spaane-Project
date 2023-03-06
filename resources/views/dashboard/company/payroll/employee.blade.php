<x-dashboard.template>
    <div x-data="{ employeeId: '' }">
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
{{--                        <button type="button" class="btn-lg btn-primary mr-2" data-toggle="modal" data-target="#modal-slideright">Create payslip</button>--}}
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
                    <table class="js-table-sections table table-hover js-table-sections-enabled" id="btabs-internal">
                        <thead>
                        <tr>
                            <th style="width: 20%;">Employee</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Basic Salary</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Commission</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Travel Allowance</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Reimbursement</th>
                            <th style="width: 10%;">Reference</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="js-table-sections-header">
                        @empty(!$employees)
                            @foreach($employees as $employee)
                                <tr>
                                    <td>
                                        <p class="font-w600 mb-10">
                                            {{ $employee->name }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="font-w600 mb-10">
                                            {{ $employee->payslips->where('date', $date)->first()?->basic_salary }}
                                        </p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted"> {{ $employee->payslips->where('date', $date)->first()?->commission }}</em>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted"> {{ $employee->payslips->where('date', $date)->first()?->travel_allowance }}</em>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted"> {{ $employee->payslips->where('date', $date)->first()?->reimbursement }}</em>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted">  {{ $employee->payslips->where('date', $date)->first()?->reference_number }} </em>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        @if(!$employee->payslips->where('date', $date)->first())
                                            <button type="button" x-on:click="employeeId = {{ $employee->id }}" class="btn-lg btn-primary mr-2" data-toggle="modal" data-target="#modal-slideright">Payslip</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endempty
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
                                            <select x-model="employeeId" class="form-control" name="employee_id" disabled>
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
                            <input type="hidden" class="form-control" id="example-text-input"  x-model="employeeId" name="employee_id">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Slide Right Modal -->
        @push('extra-js')
            <script>
                jQuery(function () {
                    // Init page helpers (Table Tools helper)
                    Codebase.helpers('table-tools');
                });
            </script>
            <script src="//unpkg.com/alpinejs" defer></script>
        @endpush
    </div>
</x-dashboard.template>

