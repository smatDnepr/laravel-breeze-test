<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Blank Page</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="/assets/admin/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="/assets/admin/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="/assets/admin/styles.css">
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<a href="{{ route('admin.index') }}" class="brand-link">
				<img src="/assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Admin panel</span>
			</a>

			<div class="sidebar">
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="/assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">{{ auth()->user()->name }}</a>
					</div>
				</div>
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="{{ route('admin.fileManager') }}" class="nav-link">
								<i class="nav-icon far fa-folder-open"></i>
								<p>Файловый менеджер</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.editor') }}" class="nav-link">
								<i class="nav-icon fas fa-edit"></i>
								<p>Редактор</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.fileUpload') }}" class="nav-link">
								<i class="nav-icon fas fa-file-upload"></i>
								<p>Загрузка файлов</p>
							</a>
						</li>
						
					</ul>
				</nav>
			</div>
		</aside>


		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>@yield('title')</h1>
						</div>
					</div>
				</div>
			</section>

			@yield('content')
		</div>


	</div>


	<script src="/assets/admin/plugins/jquery/jquery.min.js"></script>
	<script src="/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/assets/admin/dist/js/adminlte.min.js"></script>
	<script src="/assets/admin/dist/js/demo.js"></script>
	<script src="/assets/admin/ckeditor5/build/ckeditor.js"></script>
	<script src="/assets/admin/ckfinder/ckfinder.js"></script>
	<script src="/assets/admin/scripts.js"></script>

</body>

</html>
