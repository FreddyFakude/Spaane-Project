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
                    <button type="button" class="btn-lg btn-primary mr-2" data-toggle="modal" data-target="#modal-slideright">Add Employee</button>
                    <button class="btn-lg btn-danger mr-2">Remove  Employee</button>
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
                        <th class="text-center" style="width: 70px;">
                            <label class="css-control css-control-primary css-checkbox py-0">
                                <input type="checkbox" class="css-control-input" id="check-all" name="check-all">
                                <span class="css-control-indicator"></span>
                            </label>
                        </th>
                        <th style="width: 20%;">Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 70%;">Year</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Count</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <label class="css-control css-control-primary css-checkbox">
                                    <input type="checkbox" class="css-control-input" id="row_1" name="row_1">
                                    <span class="css-control-indicator"></span>
                                </label>
                            </td>
                            <td>
                                <p class="font-w600 mb-10">
                                    <a href="{{ route('dashboard.business.payroll.show', [Carbon\Carbon::now()->format('Y-m-d')]) }}">
                                        {{ Carbon\Carbon::now()->format('F') }}
                                    </a>
                                </p>
                            </td>
                            <td>
                                <p class="font-w600 mb-10">
                                   {{ Carbon\Carbon::now()->format('Y') }}
                                </p>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">#</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <label class="css-control css-control-primary css-checkbox">
                                    <input type="checkbox" class="css-control-input" id="row_1" name="row_1">
                                    <span class="css-control-indicator"></span>
                                </label>
                            </td>
                            <td>
                                <p class="font-w600 mb-10">
                                    <a href="{{ route('dashboard.business.payroll.show', [Carbon\Carbon::now()->sub("month", 1)->format('Y-m-d')]) }}">
                                        {{ Carbon\Carbon::now()->sub("month", 1)->format('F') }}
                                    </a>
                                </p>
                            </td>
                            <td>
                                <p class="font-w600 mb-10">
                                   {{ Carbon\Carbon::now()->sub("month", 1)->format('Y') }}
                                </p>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">#</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <label class="css-control css-control-primary css-checkbox">
                                    <input type="checkbox" class="css-control-input" id="row_1" name="row_1">
                                    <span class="css-control-indicator"></span>
                                </label>
                            </td>
                            <td>
                                <a href="{{ route('dashboard.business.payroll.show', [Carbon\Carbon::now()->sub("month", 2)->format('Y-m-d')]) }}">
                                    {{ Carbon\Carbon::now()->sub("month", 2)->format('F') }}
                                </a>
                            </td>
                            <td>
                                <p class="font-w600 mb-10">
                                   {{ Carbon\Carbon::now()->sub("month", 2)->format('Y') }}
                                </p>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">#</em>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

</x-dashboard.template>
