<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
        {{--                <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">--}}
        {{--                    <i class="fa fa-navicon"></i>--}}
        {{--                </button>--}}
        <!-- END Toggle Sidebar -->
        {{--                <div class="" >--}}
        {{--                    <div class="">--}}
        {{--                        <div class="content text-center overflow-hidden">--}}
        {{--                            <input type="text" class="form-control" placeholder="Search33 or hit ESC.." id="page-header-search-input" name="page-header-search-input">--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        <!-- END Layout Options -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="content-header-section">
            <!-- User Dropdown -->
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-rounded" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a class="img-link" href="#">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('assets/custom/media/avatars/avatar15.jpg')}}" alt="">
                    </a>
                </button>
                <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                    <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>
{{--                    <a class="dropdown-item" href="{{ route('dashboard.talent.profile.view') }}">--}}
                        <i class="si si-user mr-5"></i> Profile
                    </a>
                {{--                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">--}}
                {{--                            <span><i class="si si-envelope-open mr-5"></i> Inbox</span>--}}
                {{--                            <span class="badge badge-primary">3</span>--}}
                {{--                        </a>--}}
                {{--                        <a class="dropdown-item" href="be_pages_generic_invoice.html">--}}
                {{--                            <i class="si si-note mr-5"></i> Invoices--}}
                {{--                        </a>--}}
                {{--                        <div class="dropdown-divider"></div>--}}

                <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                {{--                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">--}}
                {{--                            <i class="si si-wrench mr-5"></i> Settings--}}
                {{--                        </a>--}}
                <!-- END Side Overlay -->

                    <div class="dropdown-divider"></div>
                    <form action="{{ route('employee.logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item">
                            <i class="si si-logout mr-5"></i> Sign Out
                        </button>
                    </form>
                </div>
            </div>
            <!-- END User Dropdown -->

            <!-- Notifications -->
            <div class="btn-group" role="group">
                {{--                    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--                        <i class="fa fa-flag"></i>--}}
                {{--                        <span class="badge badge-primary badge-pill">5</span>--}}
                {{--                    </button>--}}
                {{--                    <div class="dropdown-menu dropdown-menu-right min-width-300" aria-labelledby="page-header-notifications">--}}
                {{--                        <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Notifications</h5>--}}
                {{--                        <ul class="list-unstyled my-10">--}}
                {{--                            <li>--}}
                {{--                                <a class="text-body-color media mb-15" href="javascript:void(0)">--}}
                {{--                                    <div class="ml-5 mr-15">--}}
                {{--                                        <i class="fa fa-fw fa-check text-success"></i>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="media-body pr-5">--}}
                {{--                                        <div class="font-w600">You’ve upgraded to a VIP account successfully!</div>--}}
                {{--                                        <div class="text-muted font-italic">15 min ago</div>--}}
                {{--                                    </div>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                <a class="text-body-color media mb-15" href="javascript:void(0)">--}}
                {{--                                    <div class="ml-5 mr-15">--}}
                {{--                                        <i class="fa fa-fw fa-exclamation-triangle text-warning"></i>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="media-body pr-5">--}}
                {{--                                        <div class="font-w600">Please check your payment info since we can’t validate them!</div>--}}
                {{--                                        <div class="text-muted font-italic">50 min ago</div>--}}
                {{--                                    </div>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                <a class="text-body-color media mb-15" href="javascript:void(0)">--}}
                {{--                                    <div class="ml-5 mr-15">--}}
                {{--                                        <i class="fa fa-fw fa-times text-danger"></i>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="media-body pr-5">--}}
                {{--                                        <div class="font-w600">Web server stopped responding and it was automatically restarted!</div>--}}
                {{--                                        <div class="text-muted font-italic">4 hours ago</div>--}}
                {{--                                    </div>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                <a class="text-body-color media mb-15" href="javascript:void(0)">--}}
                {{--                                    <div class="ml-5 mr-15">--}}
                {{--                                        <i class="fa fa-fw fa-exclamation-triangle text-warning"></i>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="media-body pr-5">--}}
                {{--                                        <div class="font-w600">Please consider upgrading your plan. You are running out of space.</div>--}}
                {{--                                        <div class="text-muted font-italic">16 hours ago</div>--}}
                {{--                                    </div>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                <a class="text-body-color media mb-15" href="javascript:void(0)">--}}
                {{--                                    <div class="ml-5 mr-15">--}}
                {{--                                        <i class="fa fa-fw fa-plus text-primary"></i>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="media-body pr-5">--}}
                {{--                                        <div class="font-w600">New purchases! +$250</div>--}}
                {{--                                        <div class="text-muted font-italic">1 day ago</div>--}}
                {{--                                    </div>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                        <div class="dropdown-divider"></div>--}}
                {{--                        <a class="dropdown-item text-center mb-0" href="javascript:void(0)">--}}
                {{--                            <i class="fa fa-flag mr-5"></i> View All--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
            </div>
            <!-- END Notifications -->

            <!-- END Toggle Side Overlay -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header">
        <div class="content-header content-header-fullrow">
            <form action="be_pages_generic_search.html" method="post">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <!-- Close Search Section -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-times"></i>
                        </button>
                        <!-- END Close Search Section -->
                    </div>
                    <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
