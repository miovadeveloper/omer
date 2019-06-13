<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('hastalar_access')
                <li class="nav-item">
                    <a href="{{ route("admin.hastalars.index") }}" class="nav-link {{ request()->is('admin/hastalars') || request()->is('admin/hastalars/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.hastalar.title') }}
                    </a>
                </li>
            @endcan
            @can('takipler_access')
                <li class="nav-item">
                    <a href="{{ route("admin.takiplers.index") }}" class="nav-link {{ request()->is('admin/takiplers') || request()->is('admin/takiplers/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.takipler.title') }}
                    </a>
                </li>
            @endcan
           {{--  @can('notlar_access')
                <li class="nav-item">
                    <a href="{{ route("admin.notlars.index") }}" class="nav-link {{ request()->is('admin/notlars') || request()->is('admin/notlars/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-align-justify nav-icon">

                        </i>
                        {{ trans('cruds.notlar.title') }}
                    </a>
                </li>
            @endcan
            @can('dokumanlar_access')
                <li class="nav-item">
                    <a href="{{ route("admin.dokumanlars.index") }}" class="nav-link {{ request()->is('admin/dokumanlars') || request()->is('admin/dokumanlars/*') ? 'active' : '' }}">
                        <i class="fa-fw fab fa-accusoft nav-icon">

                        </i>
                        {{ trans('cruds.dokumanlar.title') }}
                    </a>
                </li>
            @endcan
            @can('laboratuvar_access')
                <li class="nav-item">
                    <a href="{{ route("admin.laboratuvars.index") }}" class="nav-link {{ request()->is('admin/laboratuvars') || request()->is('admin/laboratuvars/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.laboratuvar.title') }}
                    </a>
                </li>
            @endcan
            @can('ameliyatlar_access')
                <li class="nav-item">
                    <a href="{{ route("admin.ameliyatlars.index") }}" class="nav-link {{ request()->is('admin/ameliyatlars') || request()->is('admin/ameliyatlars/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.ameliyatlar.title') }}
                    </a>
                </li>
            @endcan
            @can('usg_access')
                <li class="nav-item">
                    <a href="{{ route("admin.usgs.index") }}" class="nav-link {{ request()->is('admin/usgs') || request()->is('admin/usgs/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.usg.title') }}
                    </a>
                </li>
            @endcan
            @can('muayane_access')
                <li class="nav-item">
                    <a href="{{ route("admin.muayanes.index") }}" class="nav-link {{ request()->is('admin/muayanes') || request()->is('admin/muayanes/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.muayane.title') }}
                    </a>
                </li>
            @endcan
            @can('trimesterbir_access')
                <li class="nav-item">
                    <a href="{{ route("admin.trimesterbirs.index") }}" class="nav-link {{ request()->is('admin/trimesterbirs') || request()->is('admin/trimesterbirs/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.trimesterbir.title') }}
                    </a>
                </li>
            @endcan
            @can('trimesterikiuc_access')
                <li class="nav-item">
                    <a href="{{ route("admin.trimesterikiucs.index") }}" class="nav-link {{ request()->is('admin/trimesterikiucs') || request()->is('admin/trimesterikiucs/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.trimesterikiuc.title') }}
                    </a>
                </li>
            @endcan
            @can('receteler_access')
                <li class="nav-item">
                    <a href="{{ route("admin.recetelers.index") }}" class="nav-link {{ request()->is('admin/recetelers') || request()->is('admin/recetelers/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.receteler.title') }}
                    </a>
                </li>
            @endcan
            @can('receteitem_access')
                <li class="nav-item">
                    <a href="{{ route("admin.receteitems.index") }}" class="nav-link {{ request()->is('admin/receteitems') || request()->is('admin/receteitems/*') ? 'active' : '' }}">
                        <i class="fa-fw far fa-address-book nav-icon">

                        </i>
                        {{ trans('cruds.receteitem.title') }}
                    </a>
                </li>
            @endcan

            --}}
            @can('sabitler_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.sabitler.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('hasta_kategorileri_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.hasta-kategorileris.index") }}" class="nav-link {{ request()->is('admin/hasta-kategorileris') || request()->is('admin/hasta-kategorileris/*') ? 'active' : '' }}">
                                    <i class="fa-fw fab fa-accessible-icon nav-icon">

                                    </i>
                                    {{ trans('cruds.hastaKategorileri.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('ilaclar_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.ilaclars.index") }}" class="nav-link {{ request()->is('admin/ilaclars') || request()->is('admin/ilaclars/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('cruds.ilaclar.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

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
