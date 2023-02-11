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
            @if(session()->has('interview-request-success'))
                <div class="alert alert-success alert-dismissable w-100" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                    <p class="mb-0">Interview Request Submitted</p>
                </div>
            @endif
            @foreach($talents as $talent)
                @continue(($talent->talent_profileable_type == 'App\Models\Employee') && $talent->talent_profileable->business_id === $businessId)
                <div class="col-md-6 col-xl-4">
                    <div class="block">
                        <div class="block-content">
                            <div class="d-flex">
                                <img class="img-avatar img-avatar96 mr-2" src="{{ asset('assets/custom/media/avatars/avatar1.jpg')}}" alt="">
                                <div class="text-left">
                                    <div class="font-size-h4 font-w600 mb-1">{{ $talent->first_name }} {{ $talent->last_name }}</div>
                                    <span class="bg-primary text-white p-2 border-radius mt-2"> {{ $talent->role }}</span>
                                </div>
                            </div>
                            {{--                            <div class="text-left font-size-h4 mt-1">--}}
                            {{--                                <i class="fa fa-fw fa-star"></i>--}}
                            {{--                                <i class="fa fa-fw fa-star"></i>--}}
                            {{--                                <i class="fa fa-fw fa-star"></i>--}}
                            {{--                                <i class="fa fa-fw fa-star"></i>--}}
                            {{--                                <i class="fa fa-fw fa-star-half-o"></i>--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="block-content block-content-full">
                            <div class="bg-light py-50 px-20">
                                <div class="row text-left">
                                    <div class="col-6 mb-2">Offers Accepted</div>
                                    <div class="col-6 mb-2">Remote</div>
                                    <div class="col-6 mb-2">Completed Tasks</div>
                                    <div class="col-6 mb-2">5</div>
                                    <div class="col-6 mb-2">Incomplete In Progress</div>
                                    <div class="col-6 mb-2">5432</div>
                                    <div class="col-6 mb-2">Employee Status</div>
                                    <div class="col-6 mb-2">{{ $talent->talent_profileable_type == 'App\Models\IndependentContractor' ? 'Independent' : 'Employee' }}</div>
                                    <div class="col-6 mb-2">City</div>
                                    <div class="col-6 mb-2">{{ $talent->address?->city }}</div>
                                    <div class="col-6 mb-2">Country</div>
                                    <div class="col-6 mb-2">{{ $talent->address?->country }}</div>
                                    <div class="col-6 mb-2">Education</div>
                                    <div class="col-6 mb-2">{{ $talent->education?->qualification }}</div>
                                </div>
                            </div>
                        </div>
                        @empty(!$talent->skills)
                            <div class="block-content block-content-full">
                                <div class="mb-20 text-left">
                                    <span>Skills</span>
                                </div>
                                <div class="row">
                                    @foreach($talent->skills as $skill)
                                        <div class="col-6">
                                            <span class="bg-light p-5 border-radius">{{ $skill->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endempty
                        <div class="block-content block-content-full pt-0">
                            <a class="btn-lg btn-secondary text-left" href="{{ route('dashboard.company.employee.view', [$talent->id]) }}">See Employee</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="modal-slideright" tabindex="-1" role="dialog" aria-labelledby="modal-slideright" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideright" role="document">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-white">
                            <h2 class="block-title text-black">Select Interview Dates</h2>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" class="calendar" id="calendar" name="date" data-week-start="1" data-today-highlight="true" required>
                                </div>
                                <div class="col-md-6">
                                    @csrf
                                    <input type="hidden" name="talent_id" value="" id="talent_id">
                                    <input type="time" name="time" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-alt-success">
                            <i class="fa fa-check"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('extra-css')
        <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">
    @endpush
<!-- END Page Content -->
    @push('extra-js')
        <script src="https://unpkg.com/js-datepicker"></script>
        <script>
            function showModal(id){
                document.querySelector('#talent_id').value = id;
                jQuery('#modal-slideright').modal('show');
            }
            const picker = datepicker(document.querySelector('#calendar'), {
                alwaysShow: true,noWeekends: true,
                events: [
                    new Date()
                ],
                formatter: (input, date, instance) => {
                    input.value = moment(date).format('YYYY-MM-DD') // => '1/1/2099'
                }
            })
        </script>
    @endpush
    <style>
        .qs-datepicker-container{
            position: relative;
        }
        .tb-form-control .input-group-text{
            height: 53px;
        }
        .tb-form-control .form-control-lg{
            height: 53px;
            background-color: #c6c6c6;
        }
        .tb-form-control .input-group-prepend{
            margin-left: -5px;
        }
        .tb-form-control .input-group-text{
            background-color: #c6c6c6;
        }
    </style>
</x-dashboard.template>
