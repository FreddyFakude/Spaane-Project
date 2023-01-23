<div class="block-content">
    <div class="d-flex">
        <img class="img-avatar img-avatar96 mr-2" src="{{ asset('assets/custom/media/avatars/avatar1.jpg')}}" alt="">
        <div class="text-left">
            <div class="font-size-h4 font-w600 mb-1">{{ $talent->first_name }}</div>
            <span class="p-2 border-radius mt-2">{{ $talent->role }}</span>
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
            <div class="col-6 mb-2">Employee Type</div>
            <div class="col-6 mb-2">{{ isset($talent->talent_profileable->type) ? $talent->talent_profileable->type: 'Independent Contractor' }}</div>
            <div class="col-6 mb-2">Completed Tasks</div>
            <div class="col-6 mb-2">0</div>
            <div class="col-6 mb-2">Incomplete In Progress</div>
            <div class="col-6 mb-2">0</div>
            <div class="col-6 mb-2">City</div>
            <div class="col-6 mb-2">{{ $talent->address?->city }}</div>
            <div class="col-6 mb-2">Country</div>
            <div class="col-6 mb-2">{{ $talent->address?->country }}</div>
            <div class="col-6 mb-2">Education</div>
            <div class="col-6 mb-2">{{ $talent->education?->qualification }}</div>
        </div>
    </div>
</div>
<div class="block-content block-content-full">
    <div class="mb-20 text-left">
        <span>Fixed Availability</span>
    </div>
    <div class="row text-white">
        @if($talent->fixedAvailability)
            @foreach(explode(',', $talent->fixedAvailability->days_digit) as $day)
                <div class="col-4">
                    <span class="bg-success p-5 border-radius">Every {{ App\Models\TalentAvailability::$daysOfWeek[$day] }}</span>
                </div>
            @endforeach
        @endif
    </div>
</div>
<div class="block-content block-content-full mb-20">
    <div class="mb-20 text-left">
        <span>Skills</span>
    </div>
    <div class="row">
        @foreach($talent->skills as $skill)
            <div class="col-4">
                <span class="bg-light p-5 border-radius">{{ $skill->name }}</span>
            </div>
        @endforeach
    </div>
</div>
