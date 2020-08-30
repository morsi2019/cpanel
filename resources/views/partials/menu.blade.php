<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">  </i>
                        <!-- {{ trans('cruds.userManagement.title') }} -->
                        إدارة المستخدمين
                    </a>
                    <ul class="nav-dropdown-items">
                     
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon"> </i>
                                    الصلاحيات
                                </a>
                            </li>
                     
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon"> </i>
                                    الأدوار
                                </a>
                            </li>
                       
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">  </i>
                                    المستخدمين
                                </a>
                            </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-list nav-icon"> </i>
                        إدارة الأصناف
                    </a>

                    <ul class="nav-dropdown-items">
                     
                            <li class="nav-item">
                                <a href="{{ route("admin.itemCategories.index") }}" class="nav-link {{ request()->is('admin/itemCategories') || request()->is('admin/itemCategories/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon"> </i>
                                    فئات الأصناف
                                </a>
                            </li>
                     
                            <li class="nav-item">
                            <a href="{{ route("admin.items.index") }}" class="nav-link {{ request()->is('admin/items') || request()->is('admin/items/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-list nav-icon"> </i> </i>
                                    الأصناف
                                </a>
                            </li>
                    </ul>
                </li>
                

             
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    تسجيل الخروج
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>