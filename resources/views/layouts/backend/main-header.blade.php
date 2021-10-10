<!--=================================
 header start-->

 <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
      <a class="navbar-brand brand-logo" href="#"><img src="{{ URL::asset('backend/assets/images/logo-white.png') }}" alt="" ></a>
      <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ URL::asset('backend/assets/images/logo-icon-light.png') }}" alt=""></a>
    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
      <li class="nav-item">
        <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
      </li>
      <li class="nav-item">
        <div class="search">
          <a class="search-btn not_click" href="javascript:void(0);"></a>
          <div class="search-box not-click">
            <input type="text" class="not-click form-control" placeholder="Search" value="" name="search">
            <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
          </div>
        </div>
      </li>
    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">

            <div class="btn-group mb-1">
                <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (App::getLocale() == 'ar')
                        {{ LaravelLocalization::getCurrentLocaleName() }}
                        <img src="{{ URL::asset('backend/assets/images/flags/EG.png') }}" alt="">
                    @else
                        {{ LaravelLocalization::getCurrentLocaleName() }}
                        <img src="{{ URL::asset('backend/assets/images/flags/US.png') }}" alt="">
                    @endif
                </button>
                <div class="dropdown-menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </div>

      <li class="nav-item fullscreen">
        <a id="btnFullscreen" href="#" class="nav-link" ><i class="ti-fullscreen"></i></a>
      </li>
      {{-- <li class="nav-item dropdown ">
        <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="ti-bell"></i>
          <span class="badge badge-danger notification-status"> </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
          <div class="dropdown-header notifications">
            <strong>{{ trans('backend/main-header.Notifications') }}</strong>
            <span class="badge badge-pill badge-warning">05</span>
          </div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">{{ trans('backend/main-header.New registered user') }} <small class="float-right text-muted time">{{ trans('backend/main-header.Just now') }}</small> </a>
          <a href="#" class="dropdown-item">{{ trans('backend/main-header.New invoice received') }} <small class="float-right text-muted time">{{ trans('backend/main-header.22 mins') }}</small> </a>
          <a href="#" class="dropdown-item">{{ trans('backend/main-header.Server error report') }}<small class="float-right text-muted time">{{ trans('backend/main-header.7 hrs') }}</small> </a>
          <a href="#" class="dropdown-item">{{ trans('backend/main-header.Database report') }}<small class="float-right text-muted time">{{ trans('backend/main-header.1 days') }}</small> </a>
          <a href="#" class="dropdown-item">{{ trans('backend/main-header.Order confirmation') }}<small class="float-right text-muted time">{{ trans('backend/main-header.2 days') }}</small> </a>
        </div>
      </li> --}}
      {{-- <li class="nav-item dropdown ">
        <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-big">
          <div class="dropdown-header">
            <strong>{{ trans('backend/main-header.Quick Links') }}</strong>
          </div>
          <div class="dropdown-divider"></div>
          <div class="nav-grid">
            <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i><h5>{{ trans('backend/main-header.New Task') }}</h5></a>
            <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i><h5>{{ trans('backend/main-header.Assign Task') }}</h5></a>
          </div>
          <div class="nav-grid">
            <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i><h5>{{ trans('backend/main-header.Add Orders') }}</h5></a>
            <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i><h5>{{ trans('backend/main-header.New Orders') }}</h5></a>
          </div>
        </div>
      </li> --}}
      <li class="nav-item dropdown mr-30">
        <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img src="{{ URL::asset('backend/assets/images/profile-avatar.jpg') }}" alt="avatar">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header">
            <div class="media">
              <div class="media-body">
                <h5 class="mt-0 mb-0"> {{ Auth::User()->name }}</h5>
                <span>{{ Auth::User()->email }}</span>
              </div>
            </div>
          </div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('dashboard')}}"><i class="ti-home"></i>{{ trans('backend/main-header.Home') }}</a>
          <a class="dropdown-item" href="{{ route('invoices.index')}}"><i class="text-success ti-email"></i>{{ trans('backend/main-header.Invoices_List')}}</a>
          <a class="dropdown-item" href="{{ route('users.index')}}"><i class="text-warning ti-user"></i>{{ trans('backend/main-header.Users')}}</a>
          <a class="dropdown-item" href="{{ route('roles.index')}}"><i class="text-warning ti-user"></i>{{ trans('backend/main-header.Roles_Permission') }}</a>
          <a class="dropdown-item" href="{{ route('categories.index')}}"><i class="text-dark ti-layers-alt"></i>{{ trans('backend/main-header.categories') }} </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="text-danger ti-unlock"></i>{{ trans('backend/main-header.Logout') }} </a>
          <form id="logout-form" action="{{  \LaravelLocalization::localizeURL('/logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>

  <!--=================================
   header End-->
