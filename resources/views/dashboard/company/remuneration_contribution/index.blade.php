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
                    <h3 class="block-title">Company Contribution</h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-xl-6">
                            <form action="{{ route('dashboard.company.contributions.store') }}" method="post">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <lable>Name</lable>
                                        <input type="text" class="form-control" data-height="34px" id="example-tags1" name="contribution_name" value="">
                                    </div>
                                    <div class="col-lg-4">
                                        <lable>Percentage Value</lable>
                                        <input type="text" class="form-control" id="example-tags2" name="contribution_percentage" value="">
                                    </div>
                                    <div class="col-lg-4">
                                        @csrf
                                        <lable>Add new contribution</lable>"
                                        <input type="submit" class="btn btn-primary"  name="example-tags2" value="Add">
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
                            <th>Percentage</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($companyRemunerationContributions as $companyRemunerationContribution)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td class="font-w600">{{ $companyRemunerationContribution->name }}</td>
                                    <td class="font-w600">{{ $companyRemunerationContribution->percentage }}%</td>
                                    <td class="font-w600">
                                        @if($companyRemunerationContribution->is_active)
                                            <span class="badge badge-success">Enabled</span>
                                        @else
                                            <span class="badge badge-danger">Disabled</span>
                                        @endif
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('dashboard.company.contributions.update.status', [$companyRemunerationContribution->hash, 'active']) }}" class="btn btn-sm btn-success js-tooltip-enabled" data-toggle="tooltip" title="Activate contribution" data-original-title="Edit">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a  href="{{ route('dashboard.company.contributions.update.status', [$companyRemunerationContribution->hash, 'inactive']) }}" class="btn btn-sm btn-warning js-tooltip-enabled" data-toggle="tooltip" title="Deactivate contribution" data-original-title="Edit">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-alt-primary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <form action="{{ route('dashboard.company.contributions.destroy', [$companyRemunerationContribution->hash]) }}" method="post">
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
