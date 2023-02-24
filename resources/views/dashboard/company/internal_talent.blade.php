<x-dashboard.template>
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <!-- Page Content -->
    <div class="content bg-light">
        <div class="row py-20">
            <div class="col-md-12 col-xl-12">
                <div class="block">
                    <div class="block-content tab-content bg-white">
                        <div class="tab-pane active show" id="btabs-static-home" role="tabpanel">
                            <div class="">
                                <div>
                                    <div class="row">
                                        <div class="col-md-9 offset-md-2">
                                            @if(session()->has('talent-updated'))
                                                <div class="alert alert-success w-75 ">Leave updated</div>
                                            @endisset
                                            <h3>Current Leave days {{ $employee->current_leave_days}}</h3>
                                            @error('leave_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Record leave days</p>
                                                </div>
                                            </div>
                                            <form class="task_setup" method="POST" action="{{ route('dashboard.company.employee.update.leave', [$employee->id]) }}" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="taskTitle">Days (e.g: 6)</label>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <input type="date" class="form-control" name="leave_date" value="">
                                                                </div>
                                                                @csrf
                                                                <button type="submit" class="btn btn-alt-success" >
                                                                    <i class="fa fa-check"></i> Submit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mt-15"></div>
                                                    <div class="mt-15"></div>

                                                </div><!--form-group-->
                                            </form><!--form-->

                                        </div><!--col-md-9-->
                                    </div><!--row-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12 col-xl-12">
                <div class="block text-center">
                    <div class="block-content tab-content">
                        <table class="table table-striped table-vcenter" id="btabs-internal">
                            <thead>
                            <tr>
                                <th class="d-none d-sm-table-cell" style="width: 20%;">Date</th>
                                <th>Status</th>
                                <th class="d-none d-sm-table-cell" style="width: 40%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @empty(!$employee)
                                @foreach($employee->leaves as $leave)
                                    <tr>
                                        <td class="d-none d-sm-table-cell">
                                            <em class="text-muted">  {{ $leave->requested_date }} </em>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <em class="text-muted">{{ $leave->status }}</em>
                                        </td>
                                        <td class="d-none d-sm-table-cell" style="width: 40%;">
                                            @if($leave->status == \App\Models\EmployeeLeave::STATUS['pending'] || $leave->status == \App\Models\EmployeeLeave::STATUS['review'])
                                                <a href="{{ route('dashboard.company.employee.approve.leave', [$employee->id, $leave->hash]) }}" class="btn btn-success">Approve</a>
                                            @endif
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
        </div>
    </div>
    <!-- END Page Content -->
</x-dashboard.template>
