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
                        <div class="content-header-item">
                            <a class="link-effect font-w700" href="index.html">
{{--                                <i class="si si-fire text-primary"></i>--}}
{{--                                <span class="font-size-xl text-dual-primary-dark">code</span><span class="font-size-xl text-primary">vase</span>--}}
                                <img src="{{ asset('assets/images/teambix-logo-Icon.png') }}" alt="" width="80">
                            </a>
                        </div>
                        <!-- END Logo -->
                    </div>
                    <!-- END Normal Mode -->
                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li>
                            <a href="{{ route('dashboard.employee.index') }}"><i class="si si-grid fa-2x"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.employee.profile.view') }}"  class="nav-submenu" data-toggle="nav-submenu"><i class="si si-users fa-2x"></i><span class="sidebar-mini-hide">Profile</span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('dashboard.employee.profile.edit') }}"><span class="sidebar-mini-hide">Edit</span></a>
                                </li>
                            </ul>
                        </li>
{{--                        <li>--}}
{{--                            <a href="{{ route('dashboard.talent.availability') }}"><i class="si si-calendar fa-2x"></i><span class="sidebar-mini-hide">Availability</span></a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('dashboard.talent.chats') }}" class="nav-submenu"><i class="si si-users fa-2x"></i><span class="sidebar-mini-hide">Chat</span></a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- Sidebar Content -->
        </div><div class="slimScrollBar" style="background: rgb(205, 205, 205); width: 4px; position: absolute; top: 0px; opacity: 0.9; display: none; border-radius: 7px; z-index: 99; right: 0px; height: 83.538px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 1; z-index: 90; right: 0px;"></div></div>
    <!-- END Sidebar Scroll Container -->
</nav>
