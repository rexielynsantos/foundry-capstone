<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('pageTitle') - Foundry </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/bootstrap/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/admin-lte.css">
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
  </head>
  <body class="hold-transition fixed skin-red sidebar-mini">
    <div class="hold-transition fixed skin-red sidebar-mini" class="slimScrollBar">
    <div class="wrapper">


    @include('header')
    @include('sidenav')

    <div class="content-wrapper">
      <section class="content">
  			  @yield('content')
      </section>
    </div>

    <footer class="main-footer">
    <strong>Copyright © 2017 <a href="#">Precision Foundry of the Philippines Inc.</a>.</strong> All rights reserved.
    </footer>
  </div>
  </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/admin-lte.js"></script>

    <script src="../js/validation/role.js"></script>
    @stack('scripts')

    <script type="text/javascript" src="{{URL::asset('js/validation/validate.js')}}"></script>

    <script type="text/javascript">
      $('.select2').select2();
      $("[data-mask]").inputmask();
      // $(".timepicker").timepicker({
      //               showInputs: false
      //           });

    </script>
  </body>
</html>
