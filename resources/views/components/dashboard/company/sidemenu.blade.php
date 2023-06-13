<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 259px;"><div id="sidebar-scroll" style="overflow: hidden; width: auto; height: 259px;">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow px-15">
                    <!-- Mini Mode -->
                    <div class="content-header-section sidebar-mini-visible-b">
                        <!-- Logo -->
                        <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                            <img src="{{ asset('assets/images/teambix-logo-Icon.png') }}" alt="" width="25">
                        </span>
                        <!-- END Logo -->
                    </div>
                    <!-- END Mini Mode -->

                    <!-- Normal Mode -->
                    <div class="content-header-section text-left align-parent sidebar-mini-hidden">
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <!-- END Close Sidebar -->

                        <!-- Logo -->
                        <div class="content-header-item mt-30">
                            <a  href="{{ route('dashboard.company.index') }}">
                                {{--                                <i class="si si-fire text-primary"></i>--}}
                                {{--                                <span class="font-size-xl text-dual-primary-dark">code</span><span class="font-size-xl text-primary">vase</span>--}}
                                <img src="{{ asset('assets/images/spaane_white.png') }}" alt="" width="150">
                            </a>
                        </div>
                        <!-- END Logo -->
                    </div>
                    <!-- END Normal Mode -->
                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full mt-30 ">
                    <ul class="nav-main">
                        {{-- <li>
                            <a href="{{ route('dashboard.company.leave') }}"><i class="si si-grid fa-2x"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                        </li> --}}
                        <li>
                            <a href="{{ route('dashboard.company.index') }}"><i class="si si-users fa-2x"></i><span class="sidebar-mini-hide text-lg">Employees</span></a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('dashboard.company.chats') }}"><i class="si si-users fa-2x"></i><span class="sidebar-mini-hide">Chat</span></a>
                        </li> --}}
                        <li>
                            <a href="{{ route('dashboard.company.chats.bulk-messages') }}"><i class="si si-bubble fa-2x"></i><span class="sidebar-mini-hide">Announcements</span></a>
                        </li>
                        <li>
                            <a  href="{{ route('dashboard.company.leave.index') }}"><i class="si si-calendar fa-2x"></i><span class="sidebar-mini-hide">Leave</span></a>
                        </li>
                       <li>
                            <a href="{{ route('dashboard.business.payroll.index') }}"><i class="si si-bar-chart fa-2x"></i><span class="sidebar-mini-hide">Payslips</span></a>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="{{ route('dashboard.company.profile') }}"><i class="si si-settings fa-2x"></i><span class="sidebar-mini-hide">Company Settings</span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('dashboard.company.admin.profile') }}">Admin</a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard.company.profile') }}">Company Profile</a>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" >Remunerations</a>
                                    <ul>
                                        <li>
                                            <a href="{{ route('dashboard.company.contributions.index') }}">Company Contribution</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard.company.deductions.index') }}">Company Deductions</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard.company.earning_types.index') }}">Employee Earning</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- Sidebar Content -->
        </div><div class="slimScrollBar" style="background: rgb(205, 205, 205); width: 4px; position: absolute; top: 0px; opacity: 0.9; display: none; border-radius: 7px; z-index: 99; right: 0px; height: 83.538px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 1; z-index: 90; right: 0px;"></div></div>
    <!-- END Sidebar Scroll Container -->
</nav>

