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
                @if(session()->has('payslip-added'))
                    <div>
                        <div class="alert alert-success alert-dismissable w-100" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                            <p class="mb-0">Payslip created successfully</p>
                        </div>
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
                <div class="block-header">
                    <div>
                        <form action="{{ route('dashboard.business.payroll.generate.all') }}" method="post">
                            <input type="hidden" name="date" value="{{ $date }}">
                            @csrf
                            <button type="submit" class="btn-lg btn-success mr-2">Generate payslips for all</button>
                        </form>
                    </div>
                </div>
                <div class="block-content tab-content">
                    <table class="js-table-sections table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 30px;"></th>
                                <th>Employee</th>
                                <th style="width: 15%;">Total Earings</th>
                                <th style="width: 15%;">Total Deductions</th>
                                <th style="width: 15%;">Total Tax</th>
                                <th style="width: 15%;">Net Pay</th>
                                <th class="d-none d-sm-table-cell" style="width: 20%;">Date</th>
                            </tr>
                        </thead>
                        @empty(!$employees)
                            @foreach($employees as $employee)
                                <form action="{{ route('dashboard.business.payroll.store', [$employee->hash])  }}" method="post">
                                    <tbody class="js-table-sections-header">
                                        <tr>
                                            <td class="text-center">
                                                <i class="fa fa-angle-right"></i>
                                            </td>
                                            <td class="font-w600">{{ $employee->name }} {{ $employee->last_name }}</td>
                                            <td class="font-w600">{{ $employee->remuneration?->basic_salary + $employee->otherEarnings->sum('amount') }}</td>
                                            <td class="font-w600">R{{ $employee->remuneration?->deductions->sum('amount') }}</td>
                                            <td class="font-w600">-R1000</td>
                                            <td class="font-w600">R19000</td>
                                            <td class="d-none d-sm-table-cell">
                                                @if(!$employee->payslips->where('date', $date)->first())
                                                    @csrf
                                                    <input type="hidden" name="date" value="{{ $date }}">
                                                    <button type="submit" x-on:click="employeeId = {{ $employee->id }}" class="btn-md btn-success mr-2" >Generate Payslip</button>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p>Earnings:</p>
                                            </td>
                                            <td>
                                                <p class="font-w600 mb-10">
                                                    <label for="side-overlay-profile-email">Basic salary</label>
                                                    <input type="number" name="basic_salary" value="{{ $employee->remuneration?->basic_salary }}">
                                                </p>
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <label for="side-overlay-profile-email">Commission</label>
                                                <input type="text" name="commission" value="{{ $employee->payslips->where('date', $date)->first()?->commission ?? 0 }}">
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <label for="side-overlay-profile-email">Travel allowance</label>
                                                <input type="number" name="travel_allowance" value="{{ $employee->remuneration?->travel_allowance }}">
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <label for="side-overlay-profile-email">Reimbursements</label>
                                                <input type="text" name="reimbursement" value="{{ $employee->payslips->where('date', $date)->first()?->reimbursement ?? 0 }}">
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <em class="text-muted">  {{ $employee->payslips->where('date', $date)->first()?->reference_number }} </em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Basic Deductions:</p>
                                            </td>
                                            <td>
                                                <p class="font-w600 mb-10">
                                                    <label for="side-overlay-profile-email">Employee Loan</label>
                                                    <input type="number" name="basic_salary" value="">
                                                </p>
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <label for="side-overlay-profile-email">Medical Aid</label>
                                                <input type="number" name="mediacl_aid" value="{{ $employee->payslips->where('date', $date)->first()?->commission ?? 0 }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Tax Deduction:</p>
                                            </td>
                                            <td>
                                                <p class="font-w600 mb-10">
                                                    <label for="side-overlay-profile-email">PAYE</label>
                                                    <input type="number" name="basic_salary" value="{{ (new \App\Services\TaxCalculations\PAYECalculator($employee))->calculatePaye() }}">
                                                </p>
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <label for="side-overlay-profile-email">UIF</label>
                                                <input type="number" name="uif" value="{{ (new \App\Services\TaxCalculations\UIFCalculator($employee))->calculateUIF() }}">
                                            </td>
                                            @if($employee->payslips->where('date', $date)->first()?->reference_number)
                                                <td class="d-none d-sm-table-cell">
                                                    <em class="text-muted">  {{ $employee->payslips->where('date', $date)->first()->reference_number }} </em>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <label for="side-overlay-profile-email">Download Payslip</label>
                                                    <a href="{{ route('dashboard.business.payroll.download', [$employee->hash, $employee->payslips->where('date', $date)->first()->hash]) }}" class="btn btn-primary">View</a>
                                                </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </form>
                            @endforeach
                        @endempty
                    </table>
                </div>
            </div>
        </div>
        <!-- END Page Content -->

        <!-- Slide Right Modal -->
        <div class="modal fade" id="modal-slideright" tabindex="-1" role="dialog" aria-labelledby="modal-slideright" aria-hidden="true">
            <div class="modal-dialog modal-dialog-slideright modal-lg" role="document">
                <div class="modal-content">
                    <form action="#" method="post">
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

