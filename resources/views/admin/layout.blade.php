<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel - @yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/assets-admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets-admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets-admin/styles.css">
</head>
<body class="hold-transition sidebar-mini">

	<div class="overlay">
		<i class="fas fa-2x fa-sync-alt fa-spin"></i>
	</div>

    <div class="wrapper">
        @include('admin.sidebar')

        <div class="content-wrapper">
            @include('admin.contentHeader')
            @include('admin.contentAlerts')
            @yield('content')
        </div>
    </div>


    <script src="/assets-admin/plugins/jquery/jquery.min.js"></script>
    <script src="/assets-admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    {{-- <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script> --}}
    <script src="/assets-admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets-admin/dist/js/adminlte.min.js"></script>
    {{-- <script src="/assets-admin/dist/js/demo.js"></script> --}}
    <script src="/assets-admin/ckeditor5/build/ckeditor.js"></script>
    <script src="/assets-admin/ckfinder/ckfinder.js"></script>
    <script src="/assets-admin/scripts.js"></script>
</body>
</html>
