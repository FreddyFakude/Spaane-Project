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
                    <ul class="nav nav-tabs shadow justify-content-around bg-light nav-tabs-block js-tabs p-10 mb-10" data-toggle="tabs" role="tablist" style="border-radius: 8px">
                        <li class="nav-item">
                            <a class="btn btn-light bg-white" href="#btabs-static-home">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-light bg-white"  href="#btabs-static-ongoing">Ongoing</a>
                        </li>
                    </ul>
                    <div class="block-content tab-content bg-white">
                        <div class="tab-pane active show" id="btabs-static-home" role="tabpanel">
                            <div class="">
                                <p>Current Leave days {{ $employee->leaveDays->last()}}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="btabs-static-ongoing" role="tabpanel">
                            <div id="faq1" role="tablist" aria-multiselectable="true">
                                {{--                                <div class="block block-bordered block-rounded mb-5">--}}
                                {{--                                    <div class="block-header" role="tab" id="faq1_h1">--}}
                                {{--                                        <a class="font-w600 text-body-color-dark collapsed" data-toggle="collapse" data-parent="#faq1" href="#faq1_q1" aria-expanded="false" aria-controls="faq1_q1">1.1 Welcome to your own dashboard</a>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div id="faq1_q1" class="collapse" role="tabpanel" aria-labelledby="faq1_h1" style="">--}}
                                {{--                                        <div class="block-content border-t">--}}
                                {{--                                            <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="block block-bordered block-rounded mb-5">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="block text-center">
{{--                    <x-dashboard.talent-details :talent="$talent"></x-dashboard.talent-details>--}}
                    <div class="block-content block-content-full pt-0">
                        <div class="text-left">
{{--                            <a href="{{ route('dashboard.talent.profile.edit') }}" class="btn-lg btn-primary">Edit profile</a>--}}
                            <a href="#" class="btn-lg btn-primary">Delete</a>
                        </div>
                    </div>
                    <div class="block-content block-content-full pt-0">
                        <div class="text-left">
                            <a href="#" class="btn-lg btn-secondary">Upload document</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</x-dashboard.template>
