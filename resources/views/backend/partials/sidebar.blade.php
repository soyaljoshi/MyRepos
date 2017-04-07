<aside id="sidebar_main">

    <div class="sidebar_main_header">
        <div class="sidebar_logo">
            <a href="{{ route('admin::dashboard') }}" class="sSidebar_hide">
              <img src="{{ asset(config('website.adminLogo') ) }}" alt="" height="10" width="35"/>
               <span>{{ config('website.title') }}</span>
            </a>
            <a href="{{ route('admin::dashboard') }}" class="sSidebar_show">
                <img src="{{ asset('assets/frontend/images/vargnepal.png') }}" alt="" height="32" width="32"/>
            </a>
        </div>
    </div>

    <div class="menu_section">
        <ul>
            <li>
                <a href="{{ route('admin::dashboard') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">Dashboard</span>
                </a>
            </li>
             <li>
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE8B8;</i></span>
                    <span class="menu_title">Home Setting</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin::slidersetting.index') }}">Slider Setting</a>
                    </li>
                    <li>
                        <a href="{{ route('admin::homesectionsetting.index') }}">Section Setting</a>
                    </li>
                   <!--  <li>
                        <a href="{{ route('admin::populartest.index') }}">Recent Research Setting</a>
                    </li> -->
                </ul>
            </li>
         
           {{--  <li>
                <a href="{{ route('admin::departments.index') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE85D;</i></span>
                    <span class="menu_title">Departments</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('admin::post.index') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE060;</i></span>
                    <span class="menu_title">Posts & Activities</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin::page.index') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE051;</i></span>
                    <span class="menu_title">Pages</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin::menu') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE5D2;</i></span>
                    <span class="menu_title">Menu</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('admin::staffmanagement.index') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE8F6;</i></span>
                    <span class="menu_title">Staff Management</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('admin::packages.index') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE8A7;</i></span>
                    <span class="menu_title">Partners</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin::albumsetting.index') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE413;</i></span>
                    <span class="menu_title">Photo Gallery</span>
                </a>
            </li>
           
            {{-- <li>
                <a href="{{ route('admin::setting') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE8C0;</i></span>
                    <span class="menu_title">Settings</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('admin::user.index') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE7FB;</i></span>
                    <span class="menu_title">Users</span>
                </a>
            </li>
           {{--  <li>
                <a href="{{ route('admin::customer.index') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE7FC;</i></span>
                    <span class="menu_title">Customers</span>
                </a>
            </li> --}}
        </ul>
    </div>
</aside>