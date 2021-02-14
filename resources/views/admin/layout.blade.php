<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel - @yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/admin-panel/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/admin-panel/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/admin-panel/styles.css">
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


    <script src="/admin-panel/plugins/jquery/jquery.min.js"></script>
    <script src="/admin-panel/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    {{-- <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script> --}}
    <script src="/admin-panel/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin-panel/dist/js/adminlte.min.js"></script>
    {{-- <script src="/admin-panel/dist/js/demo.js"></script> --}}
	
    <script src="/ckeditor5/build/ckeditor.js"></script>
    <script src="/ckfinder/ckfinder.js"></script>
	
    <script src="/admin-panel/scripts.js"></script>
</body>
</html>
