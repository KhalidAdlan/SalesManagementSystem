<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-users nav-icon">

                    </i>
                    {{ trans('global.salesManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.salesPersons.index") }}" class="nav-link {{ request()->is('admin/salesPerson') || request()->is('admin/salesPerson/*') ? 'active' : '' }}">
                            <i class="fas fa-unlock-alt nav-icon">

                            </i>
                            {{ trans('global.salesPerson.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.customers.index") }}" class="nav-link {{ request()->is('admin/customer') || request()->is('admin/customer/*') ? 'active' : '' }}">
                            <i class="fas fa-unlock-alt nav-icon">

                            </i>
                            {{ trans('global.customer.title') }}
                        </a>
                    </li>

                </ul>
            </li>
            

            <li class="nav-item nav-dropdown">
                <a class="nav-link  n" href="{{route('admin.dashboards.inventory')}}">
                    <i class="fas fa-users nav-icon av-dropdown-toggle">

                    </i>
                    {{ trans('global.inventoryManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a href="{{ route("admin.sections.index") }}" class="nav-link {{ request()->is('admin/sections') || request()->is('admin/sections/*') ? 'active' : '' }}">
                            <i class="fas fa-cogs nav-icon">

                            </i>
                            {{ trans('global.section.title') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                            <i class="fas fa-cogs nav-icon">

                            </i>
                            {{ trans('global.product.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.purchases.index") }}" class="nav-link {{ request()->is('admin/purchases') || request()->is('admin/purchases/*') ? 'active' : '' }}">
                            <i class="fas fa-cogs nav-icon">

                            </i>
                            {{ trans('global.purchase.title') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("admin.suppliers.index") }}" class="nav-link {{ request()->is('admin/suppliers') || request()->is('admin/suppliers/*') ? 'active' : '' }}">
                            <i class="fas fa-cogs nav-icon">

                            </i>
                            {{ trans('global.supplier.title') }}
                        </a>
                    </li>





                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-users nav-icon">

                    </i>
                    {{ trans('global.userManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="fas fa-unlock-alt nav-icon">

                            </i>
                            {{ trans('global.permission.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fas fa-briefcase nav-icon">

                            </i>
                            {{ trans('global.role.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fas fa-user nav-icon">

                            </i>
                            {{ trans('global.user.title') }}
                        </a>
                    </li>
                </ul>
            </li>
            

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>