<div class="block-content">
    <div class="d-flex">
        <img class="img-avatar img-avatar96 mr-2" src="{{ asset('assets/custom/media/avatars/avatar1.jpg')}}" alt="">
        <div class="text-left">
            <div class="font-size-h4 font-w600 mb-1">{{ $employee->first_name }} {{ $employee->last_name }}</div>
            <span class="p-2 border-radius mt-2">{{ $employee->role }}</span>
            <div class="pl-2"><small>Engineering (Permenant)</small></div>
        </div>
    </div>
</div>
<div class="block-content block-content-full">
    <div class="bg-light py-50 px-20">
        <div class="row text-left">
            <div class="col-6 mb-2">Gender</div>
            <div class="col-6 mb-2">Female</div>
            <div class="col-6 mb-2">Date Of Birth</div>
            <div class="col-6 mb-2">09 February 1980</div>
            <div class="col-6 mb-2">Marital Status</div>
            <div class="col-6 mb-2">Single</div>
            <div class="col-6 mb-2">Personal cell number</div>
            <div class="col-6 mb-2">0734562789</div>
            <div class="col-6 mb-2">Emergency cell number</div>
            <div class="col-6 mb-2">0845672901</div>
            <div class="col-6 mb-2">Work phone number</div>
            <div class="col-6 mb-2">0124563789</div>
            <div class="col-6 mb-2">Personal email</div>
            <div class="col-6 mb-2">jay@gmail.com</div>
            <div class="col-6 mb-2">Work email</div>
            <div class="col-6 mb-2">jay@corporate.co.za</div>
            <div class="col-6 mb-2">Employment Start Date</div>
            <div class="col-6 mb-2">12 March 2015</div>
            <div class="col-6 mb-2">Direct Manager/Supervisor</div>
            <div class="col-6 mb-2">Thabo Manko</div>
            <div class="col-6 mb-2">Employee Tax Number</div>
            <div class="col-6 mb-2">90463572836</div>
            <div class="col-6 mb-2">City</div>
            <div class="col-6 mb-2">{{ $employee->address?->city }}</div>
            <div class="col-6 mb-2">Country</div>
            <div class="col-6 mb-2">{{ $employee->address?->country }}</div>
            <div class="col-6 mb-2">Education</div>
            <div class="col-6 mb-2">{{ $employee->education?->qualification }}</div>
{{--            <h5 class="col-6 mb-2 mt-20">Manual Leave Request</h5>--}}
{{--            <small class="col-6 ml-2">Leave Balance:</small> --}}
{{--            <span class="badge badge-warning mr-10 mb-10">Annnual - 10 days</span>--}}
{{--            <span class="badge badge-primary mr-10 mb-10">Maternity - 4 months</span>--}}
{{--            <span class="badge badge-info mr-10 mb-10">Sick - 8 days</span>--}}
{{--            <span class="badge badge-danger mr-10  mb-10">Study - 8 days</span>--}}
{{--            <span class="badge badge-success mr-10 mb-10">Family responsibility - 4 days</span>--}}
{{--            <span class="badge badge-secondary mr-10 mb-10">Religious - 4 days</span>--}}
{{--            <div class="col-md-12">--}}
{{--                <select class="js-select2 form-control" id="example-select2" name="example-select2" style="width: 100%;" data-placeholder="Choose leave policy">--}}
{{--                    <option value="0">Choose Policy Leave</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->--}}
{{--                    <option value="1">Annual leave</option>--}}
{{--                    <option value="2">Maternity leave</option>--}}
{{--                    <option value="3">Sick leave</option>--}}
{{--                    <option value="4">Study leave</option>--}}
{{--                    <option value="5">Religious leave</option>--}}
{{--                    <option value="6">Family Responsibility leave</option>--}}
{{--                </select>--}}
{{--            </div>--}}
            {{-- <form class="task_setup" method="POST" action="{{ route('dashboard.company.employee.update.leave', [$employee->id]) }}" enctype="multipart/form-data"> --}}
{{--                <div class="form-group row ml-2 mt-10">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="input-daterange input-group" data-date-format="mm/dd/yyyy" data-week-start="1" data-autoclose="true" data-today-highlight="true">--}}
{{--                            <input type="date" class="form-control" id="example-daterange1" name="example-daterange1" placeholder="From" data-week-start="1" data-autoclose="true" data-today-highlight="true">--}}
{{--                            <div class="input-group-prepend input-group-append">--}}
{{--                                <span class="input-group-text font-w600">to</span>--}}
{{--                            </div>--}}
{{--                            <input type="date" class="form-control mr-10" id="example-daterange2" name="example-daterange2" placeholder="To" data-week-start="1" data-autoclose="true" data-today-highlight="true">--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="btn btn-alt-success ml-0" ><i class="fa fa-check"></i> Submit</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
                {{-- <input type="date" class="form-control" name="leave_date" value=""> --}}
            {{-- </form> --}}
        </div>
    </div>
</div>
{{-- <div class="block-content block-content-full mb-20">
    <div class="mb-20 text-left">
        <span>Skills</span>
    </div>
    <div class="row"> --}}
{{--        @foreach($employee->skills as $skill)--}}
{{--            <div class="col-4">--}}
{{--                <span class="bg-light p-5 border-radius">{{ $skill->name }}</span>--}}
{{--            </div>--}}
{{--        @endforeach--}}
    {{-- </div>
</div> --}}
