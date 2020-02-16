<!DOCTYPE html>
<html class="no-js before-run" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="{{trans('messages.remapas-chip-tuning-og-desc.')}}">
  <meta name="author" content="File Service">
  <meta property="og:url" content="https://chiptuning.file-service.site/" />
  <meta property="og:site_name" content="{{trans('CHIPTUNING')}}" />
 

  <title>@yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{asset('images/icon.png')}}" />
  <link rel="apple-touch-icon" href="{{asset('images/icon.png')}}" />


  <!-- Stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Raleway|Audiowide|Oswald|Roboto&amp;subset=latin-ext" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-extend.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/homepage.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/homepage.min.css?v=1.1') }}">

  <link rel="stylesheet" href="{{ asset('assets/vendor/flag-icon-css/flag-icon.css') }}">

  <link href="{{ asset('css/slick.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css/select2.css') }}" rel="stylesheet" type="text/css"/>

  <!-- Fonts -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/web-icons/web-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/brand-icons/brand-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/material-design/material-design.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-sweetalert/sweet-alert.css') }}">
  <!-- Scripts -->
  <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.0/js.cookie.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-86421361-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-86421361-1');
    gtag('config', 'AW-869656606');
  </script>
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
  <script src="{{ asset('assets/vendor/bootstrap-sweetalert/sweet-alert.js') }}"></script>
  <script>
  window.addEventListener("load", function(){
  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#23272c"
      },
      "button": {
        "background": "#e73f35"
      }
    },
    "theme": "edgeless",
    "content": {
      "message": "{{trans('privacy.notification')}}",
      "dismiss": "{{trans('privacy.gotit')}}",
      "link": "{{trans('privacy.readmore')}}",
      "href": "#",
    }
  })});
  </script>
</head>
<body class="dashboard">
@include('homepage-layout.navbar')
@yield('content')
@include('homepage-layout.footer')

</body>
  <script src="{{ asset('assets/vendor/bootbox/bootbox.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/bootstrap.js') }}"></script>
  <script src="{{ asset('js/jquery.matchHeight.js') }}"></script>
  <script>
  $(function() {
    setTimeout(function(){
      if(!Cookies.get('modalShown')) {
        $("#customModal").modal('show');
        Cookies.set('modalShown', true);
      }
    },3000);
  });
  </script>
</html>
