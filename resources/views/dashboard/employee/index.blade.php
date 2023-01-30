<x-dashboard.template>
    <x-slot name="sidemenu">
        <x-dashboard.employee.sidemenu></x-dashboard.employee.sidemenu>
    </x-slot>
    <x-slot name="header">
        <x-dashboard.employee.header></x-dashboard.employee.header>
    </x-slot>
    <!-- Page Content -->
    <div class="content bg-light">
        <div class="row py-20">
            <div class="col-md-4 col-xl-4">
                <div class="block text-center">
                    <div class="block-content">
                        <div class="d-flex">
                            <img class="img-avatar img-avatar96 mr-2" src="{{ asset('assets/custom/media/avatars/avatar1.jpg')}}" alt="">
                            <div class="text-left">
                                <div class="font-size-h4 font-w600 mb-1">{{ auth()->user()->name }}</div>
                                <span class="p-2 border-radius mt-2">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
                        {{--                        <div class="text-left font-size-h4 mt-1">--}}
                        {{--                            <i class="fa fa-fw fa-star"></i>--}}
                        {{--                            <i class="fa fa-fw fa-star"></i>--}}
                        {{--                            <i class="fa fa-fw fa-star"></i>--}}
                        {{--                            <i class="fa fa-fw fa-star"></i>--}}
                        {{--                            <i class="fa fa-fw fa-star-half-o"></i>--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="block-content block-content-full">
                        <div class="bg-light py-50 px-20">
                            {{--                            {{ $interviews[0]->date_time }}--}}
                            <div class="row text-left">
                                <div class="col-6 mb-2">Employee Type</div>
                                <div class="col-6 mb-2">Full Time</div>
                                <div class="col-6 mb-2">Completed Tasks</div>
                                <div class="col-6 mb-2">5</div>
                                <div class="col-6 mb-2">Incomplete In Progress</div>
                                <div class="col-6 mb-2">2</div>
                                <div class="col-6 mb-2">City</div>
                                <div class="col-6 mb-2">{{ auth()->user()->address?->city }}</div>
                                <div class="col-6 mb-2">Country</div>
                                <div class="col-6 mb-2">{{ auth()->user()->address?->country }}</div>
                                <div class="col-6 mb-2">Education</div>
                                <div class="col-6 mb-2">{{ auth()->user()->education?->qualification }}</div>
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="block-content block-content-full">--}}
                    {{--                        <div class="mb-20 text-left">--}}
                    {{--                            <span>Fixed Availability</span>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="row text-white">--}}
                    {{--                            <div class="col-4">--}}
                    {{--                                <span class="bg-success p-5 border-radius">Every Monday</span>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="col-4">--}}
                    {{--                                <span class="bg-success p-5 border-radius">Every Monday</span>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="col-4">--}}
                    {{--                                <span class="bg-success p-5 border-radius">Every Monday</span>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="block-content block-content-full">
                        <div class="mb-20 text-left">
                            <span>Skills</span>
                        </div>
                        <div class="row">
{{--                            @foreach(auth()->user()->skills as $skill)--}}
{{--                                <div class="col-4">--}}
{{--                                    <span class="bg-light p-5 border-radius">{{ $skill->name }}</span>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
                        </div>
                    </div>
                    <div class="block-content block-content-full pt-0">
                        <div class="text-left">
{{--                            <a href="{{ route('dashboard.talent.profile.edit') }}" class="btn-lg btn-primary">Edit profile</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
    @push('extra-css')
        <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">
        <style>
            .qs-centered{
                position: relative!important;
            }

            .img-avatar {
                width: 40px;
                height: 40px;
            }

            #icons a {
                top: -7px;
            }
        </style>
    @endpush
    @push('extra-js')
        <script src="https://unpkg.com/js-datepicker"></script>
        <script>
            const picker = datepicker(document.querySelector('#calendar'), {
                alwaysShow: true,noWeekends: true,
                position: 'c',
                events: [
                    new Date()
                ]
            })
            picker.calendarContainer.style.setProperty('font-size', '1.5rem');
        </script>
    @endpush
</x-dashboard.template>
