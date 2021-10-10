<!DOCTYPE html>
<html lang="en" dir="{{App::getLocale() == 'en' ? '':'rtl'}}">
<head>
@include('layouts.backend.head')

</head>

<body>

<div class="wrapper">

<!--=================================
 preloader -->

<div id="pre-loader">
    <img src="{{ URL::asset('backend/assets/images/pre-loader/loader-01.svg') }}" alt="">
</div>

<!--=================================
 preloader -->

 @include('layouts.backend.main-header')

<!--=================================
 Main content -->

<div class="container-fluid">
  <div class="row">

    @include('layouts.backend.main-sidebar')

 <!--=================================
wrapper -->

    <div class="content-wrapper">
        @yield('content')

<!--=================================
 wrapper -->

    @include('layouts.backend.footer')
    </div><!-- main content wrapper end-->
  </div>
 </div>
</div>

<!--=================================
 footer -->


@include('layouts.backend.script')

</body>
</html>
