<x-dashboard.template>
    <!-- Page Content -->
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <div class="content bg-light">
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
{{--            <div class="col-md-8 col-xl-8">--}}
{{--                <div class="d-flex justify-content-end">--}}
{{--                    <button type="button" class="btn-lg btn-secondary mr-2" data-toggle="modal" data-target="#modal-slideright">Add Employee</button>--}}
{{--                    <button class="btn-lg btn-primary mr-2">Delete User</button>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
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
            </div>
            <div class="block-content tab-content">
                <table class="table table-vcenter active js-table-checkable js-table-checkable-enabled tab-pane" id="btabs-internal">
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
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Employee Status</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Visibility</th>
                        <th class="d-none d-sm-table-cell" style="width: 40%;">Action</th>
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
                                    <p class="font-w600 mb-10">{{ $employee->name }}</p>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="text-muted">{{ $employee->role }}</em>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="text-muted">  {{ $employee->status }} </em>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" {{ $employee->talent_visibility == 1 ? 'checked' : '' }}  value="1">
                                                    <label class="custom-control-label" for="example-inline-radio1">Eco system</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios"  value="0" {{ $employee->talent_visibility == 0 ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="example-inline-radio2">Public</label>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                <td class="d-none d-sm-table-cell" style="width: 40%;">
                                    <a href="{{ route('dashboard.company.chat.new', [$employee->id]) }}" class="btn-primary btn">Chat</a>
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
                <form action="#" method="post">
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
                                            <label class="col-12 pl-0" for="example-text-input">Position</label>
                                            <input type="text" class="form-control" id="example-text-input" name="position" >
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        @csrf
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Slide Right Modal -->

</x-dashboard.template>
