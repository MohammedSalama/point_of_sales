<!-- Left Sidebar start-->
<div class="side-menu-fixed">
    <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">

            <li>
                <a href="{{route('dashboard')}}"><i class="ti-home"></i><span class="right-nav-text">{{trans('backend/main-sidebar.Dashboard')}}</span></a>
            </li>

           @can('قائمة الفواتير')
            <!-- menu item calendar-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                    <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{ trans('backend/main-sidebar.Invoices')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                </a>
                <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">

                    @can('عرض الفواتير')
                    <li> <a href="{{route('invoices.index')}}">{{ trans('backend/main-sidebar.Invoices List')}} </a> </li>
                    @endcan

                   @can('اضافة فاتورة جديدة')
                    <li> <a href="{{route('invoices.create')}}">{{ trans('backend/main-sidebar.Add new invoice')}}  </a> </li>
                   @endcan

                </ul>
            </li>
            @endcan

            @can('الإعدادات')
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                    <div class="pull-left"><i class="ti-settings"></i><span class="right-nav-text">{{ trans('backend/main-sidebar.Settings')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                </a>
                <ul id="elements" class="collapse" data-parent="#sidebarnav">
                    @can('الاقسام')
                    <li> <a href="{{route('categories.index')}}">{{ trans('backend/main-sidebar.Sections')}}</a> </li>
                    @endcan

                        @can('المنتجات')
                    <li><a href="{{route('products.index')}}">{{ trans('backend/main-sidebar.Products')}}</a></li>
                        @endcan
                </ul>
            </li>
            @endcan

            @can('المستخدمين')
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                    <div class="pull-left"><i class="ti-pie-chart"></i><span class="right-nav-text">{{ trans('backend/main-sidebar.Users')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                </a>
                <ul id="chart" class="collapse" data-parent="#sidebarnav">
                    @can('صلاحيات المستخدمين')
                    <li> <a href="{{route('roles.index')}}"> {{ trans('backend/main-sidebar.Users Permissions')}}</a> </li>
                    @endcan
                        @can('قائمة المستخدمين')
                    <li> <a href="{{route('users.index')}}">{{ trans('backend/main-sidebar.Users List')}} </a> </li>
                        @endcan
                </ul>
            </li>
        @endcan
            
                </ul>
            </li>
        </ul>
    </div>
</div>

<!-- Left Sidebar End-->