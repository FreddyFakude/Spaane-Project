<div class="block-content">
    <div class="d-flex">
        <img class="img-avatar img-avatar96 mr-2" src="{{ asset('assets/custom/media/avatars/avatar1.jpg')}}" alt="">
        <div class="text-left">
            <div class="font-size-h4 font-w600 mb-1">{{ $employee->first_name }}</div>
            <span class="p-2 border-radius mt-2">{{ $employee->role }}</span>
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
        <div class="row text-left">
            <div class="col-6 mb-2">Completed Tasks</div>
            <div class="col-6 mb-2">0</div>
            <div class="col-6 mb-2">Incomplete In Progress</div>
            <div class="col-6 mb-2">0</div>
            <div class="col-6 mb-2">City</div>
            <div class="col-6 mb-2">{{ $employee->address?->city }}</div>
            <div class="col-6 mb-2">Country</div>
            <div class="col-6 mb-2">{{ $employee->address?->country }}</div>
            <div class="col-6 mb-2">Education</div>
            <div class="col-6 mb-2">{{ $employee->education?->qualification }}</div>
        </div>
    </div>
</div>
<div class="block-content block-content-full mb-20">
    <div class="mb-20 text-left">
        <span>Skills</span>
    </div>
    <div class="row">
{{--        @foreach($employee->skills as $skill)--}}
{{--            <div class="col-4">--}}
{{--                <span class="bg-light p-5 border-radius">{{ $skill->name }}</span>--}}
{{--            </div>--}}
{{--        @endforeach--}}
    </div>
</div>
