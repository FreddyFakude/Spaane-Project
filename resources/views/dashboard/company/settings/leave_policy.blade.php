<x-dashboard.template>
    <!-- Page Content -->
    <x-slot name="sidemenu">
        <x-dashboard.company.sidemenu></x-dashboard.company.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.company.header></x-dashboard.company.header>
    </x-slot>
    <div class="content bg-light">
        <div class="block">
            <div class="block-header block-header-default">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissable w-100" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                        <p class="mb-0">{{ session()->get('success') }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="row justify-content-center pt-5">
                        <div class="col-md-8 col-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Leave Policy</h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-xl-6">
                            <form action="{{ route('dashboard.company.add-leave-policy') }}" method="post">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <lable>Type of leave</lable>
                                        <select name="leave_policy_type" id="" class="form-control" required>
                                            <option value=""></option>
                                            @foreach($leavePolicies as $leave)
                                                <option value="{{ $leave->id }}">{{ $leave->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <lable>Nbr of days</lable>"
                                        <input type="number" class="form-control"  name="leave_policy_days" value="10">
                                    </div>
                                    <div class="col-lg-4">
                                        @csrf
                                        <lable>Add new leave policy</lable>"
                                        <input type="submit" class="btn btn-primary"  name="example-tags2" value="Add new leave policy">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped table-vcenter mt-5">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">Nbr</th>
                            <th>Name</th>
                            <th>Number of days</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($companyLeaveTypes as $leaveType)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td class="font-w600">{{ $leaveType->leaveType->name }}</td>
                                    <td class="font-w600">{{ $leaveType->leave_duration_days }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <form action="#" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
            <style>
                .bg-light-grey{
                    background-color: #e9ecef;
                    opacity: 1;
                }

                .select2-container--default .select2-selection--multiple .select2-selection__choice{
                    background-color: #0f51bb;
                }
            </style>
            @push('extra-css')
                <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/select2/select2.min.css')}}">
                <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/select2/select2-bootstrap.min.css')}}">
                <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
            @endpush
            @push('extra-js')
                <script src="{{ asset('assets/custom/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>

                <script src="{{ asset('assets/custom/js/plugins/select2/select2.full.min.js') }}"></script>
{{--                <script src="{{ asset('assets/custom/js/pages/be_forms_plugins.js')}}"></script>--}}
                <script>
                    jQuery(function () {
                        // Init page helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
                        Codebase.helpers(['select2']);
                    });
                </script>
    @endpush
</x-dashboard.template>
