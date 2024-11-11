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
                    <h3 class="block-title">Employee Earning Type</h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-xl-6">
                            <form action="{{ route('dashboard.company.earning_types.store') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="unit_type">Unit Type</label>
                                        <select class="form-control" id="unit_type" name="unit_type">
                                            <option value="Per Hour">Per Hour</option>
                                            <option value="Per Week">Per Week</option>
                                            <option value="Per Fortnight">Per Fortnight</option>
                                            <option value="Per Month">Per Month</option>
                                            <option value="No time frame">No time frame</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>New contribution</label>
                                        <input type="submit" class="btn btn-primary" value="Add">
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
                                <th>Unit Type</th> 
                                <th>Status</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employeeEarningTypes as $earning)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td class="font-w600">{{ $earning->name }}</td>
                                    <td class="font-w600">{{ $earning->unit_type ?? 'N/A' }}</td> 
                                    <td class="font-w600">
                                        @if($earning->is_active)
                                            <span class="badge badge-success">Enabled</span>
                                        @else
                                            <span class="badge badge-danger">Disabled</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($earning->can_be_edited)
                                            <div class="btn-group">
                                                <a href="{{ route('dashboard.company.earning_types.update.status', [$earning->hash, 'active']) }}" class="btn btn-sm btn-success js-tooltip-enabled" data-toggle="tooltip" title="Activate contribution" data-original-title="Edit">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a href="{{ route('dashboard.company.earning_types.update.status', [$earning->hash, 'inactive']) }}" class="btn btn-sm btn-warning js-tooltip-enabled" data-toggle="tooltip" title="Deactivate contribution" data-original-title="Edit">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-alt-primary js-tooltip-enabled" data-toggle="tooltip" title="Edit" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <form action="{{ route('dashboard.company.earning_types.destroy', [$earning->hash]) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete" data-original-title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                </div>
            </div>
        </div>
    </div>
    <style>
        .bg-light-grey {
            background-color: #e9ecef;
            opacity: 1;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #0f51bb;
        }
    </style>
    @push('extra-css')
        <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/select2/select2-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
    @endpush
    @push('extra-js')
        <script src="{{ asset('assets/custom/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
        <script src="{{ asset('assets/custom/js/plugins/select2/select2.full.min.js') }}"></script>
        <script>
            jQuery(function () {
                Codebase.helpers(['select2']);
            });
        </script>
    @endpush
</x-dashboard.template>
