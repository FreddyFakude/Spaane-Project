<x-dashboard.template>
    <!-- Page Content -->
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <div class="content">
        <div class="row py-20 mt-50">
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
                <div class="d-flex justify-content-between">
                    <div class="content-header p-0 ml-0 mr-0" style="margin-top: -13px">
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-rounded btn-hero btn-lg btn-success mr-2" data-toggle="modal" data-target="#modal-slideright">Add Employee</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="block-header">
                @if(session()->has('talent-added'))
                    <div class="alert alert-success alert-dismissable w-100" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                        <p class="mb-0">Your invite has been sent</p>
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
                        <th class="text-center" style="width: 5%;">
                            <label class="css-control css-control-primary css-checkbox py-0">
                                <input type="checkbox" class="css-control-input" id="check-all" name="check-all">
                                <span class="css-control-indicator"></span>
                            </label>
                        </th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Employee</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Job title</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Department</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Direct Manger</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Contract type</th>
                        {{-- <th class="d-none d-sm-table-cell" style="width: 10%;">Total Leave</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Absent Days</th>
{{--                         --}}
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @empty(!$employees)
                            @foreach($employees as $employee)
                                <tr>
                                    <td class="text-center">
                                        <label class="css-control css-control-primary css-checkbox">
                                            <input type="checkbox" class="css-control-input" id="row_1" name="row_1">
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <p class="font-w600 mb-10">
                                            <a href="{{ route('dashboard.company.chat.new', [$employee]) }}">{{ $employee->first_name }} {{ $employee->last_name }}</a>
                                        </p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted">{{ $employee->role }}</em>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted">  {{ $employee->department->name }} </em>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted"> {{ $employee->direct_manager }}</em>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted"> {{ $employee->type }} </em>
                                    </td>
                                    {{-- <td class="d-none d-sm-table-cell">
                                       <em class="text-muted"> {{ $employee->current_leave_days}} days </em>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted"> 5 days</em>
                                    </td>
                                     --}}
                                    <td class="d-none d-sm-table-cell">
                                        <a href="{{ route('dashboard.business.employee.delete', [$employee->hash]) }}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">No employees found</td>
                            </tr>
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
                <form action="{{ route('dashboard.business.employee.invite')  }}" method="post">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-content">
                            <div class="d-flex justify-content-center my-20">
                                <div class="mb-20">
                                    <h2>Add new employee</h2>
                                </div>
                            </div>
                                <div class="row px-10 mt-30">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="pl-0" for="example-text-input">First Name</label>
                                            <input type="text" class="form-control bg-grey"  name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="pl-0" for="example-text-input">Last Name</label>
                                            <input type="text" class="form-control" id="example-text-input" name="last_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-10">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="pl-0" for="example-text-input">Email</label>
                                            <input type="email" class="form-control bg-grey" id="example-text-input" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-12 pl-0" for="example-text-input">Job title</label>
                                            <input type="text" class="form-control" id="example-text-input" name="position" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-12 pl-0" for="example-text-input">Phone number</label>
                                            <input type="tel" class="form-control" id="example-text-input" name="mobile_number" >
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger min-width-125 mb-10" data-dismiss="modal">Cancel</button>
                        @csrf
                    <button type="submit" class="btn btn-rounded btn-success min-width-125 mb-10">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Slide Right Modal -->

</x-dashboard.template>
