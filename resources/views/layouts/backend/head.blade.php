<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>@yield('title')</title>

@yield('css')


<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('backend/assets/images/favicon.ico') }}" />

<!-- Font -->
<link href="{{asset('backend/assets/css/fontawesome/css/all.css')}}" rel="stylesheet">

<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('backend/assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('backend/assets/css/rtl.css') }}" rel="stylesheet">
@endif
