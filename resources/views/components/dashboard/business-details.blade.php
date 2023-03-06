<div class="block-content">
    <div class="d-flex">
        <img class="img-avatar img-avatar96 mr-2" src="{{ asset('assets/custom/media/avatars/avatar1.jpg')}}" alt="">
        <div class="text-left">
            <div class="font-size-h4 font-w600 mb-1">{{ $business->name }}</div>
            <span class="p-2 border-radius mt-2">{{ $business->short_description }}</span>
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
{{--<div class="block-content block-content-full">--}}
{{--    <div class="bg-light py-50 px-20">--}}
{{--        <div class="row text-left">--}}
{{--            <div class="col-6 mb-2">Employee Type</div>--}}
{{--            <div class="col-6 mb-2">{{ isset($business->business_profileable->type) ? $business->business_profileable->type: 'Independent Contractor' }}</div>--}}
{{--            <div class="col-6 mb-2">Completed Tasks</div>--}}
{{--            <div class="col-6 mb-2">0</div>--}}
{{--            <div class="col-6 mb-2">Incomplete In Progress</div>--}}
{{--            <div class="col-6 mb-2">0</div>--}}
{{--            <div class="col-6 mb-2">City</div>--}}
{{--            <div class="col-6 mb-2">{{ $business->address?->city }}</div>--}}
{{--            <div class="col-6 mb-2">Country</div>--}}
{{--            <div class="col-6 mb-2">{{ $business->address?->country }}</div>--}}
{{--            <div class="col-6 mb-2">Education</div>--}}
{{--            <div class="col-6 mb-2">{{ $business->education?->qualification }}</div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="block-content block-content-full mb-20">--}}
{{--    <div class="mb-20 text-left">--}}
{{--        <span>Skills</span>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        @foreach($business->skills as $skill)--}}
{{--            <div class="col-4">--}}
{{--                <span class="bg-light p-5 border-radius">{{ $skill->name }}</span>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}
