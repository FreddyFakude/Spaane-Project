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
            <div class="col-md-8 col-xl-8">
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
                                                                    <input type="number" class="form-control" name="leave_days" value="">
                                                                    @error("leave_days")
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
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
            <div class="col-md-4 col-xl-4">
                <div class="block text-center">
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</x-dashboard.template>
