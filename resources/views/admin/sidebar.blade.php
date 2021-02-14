<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="{{ route('admin.index') }}" class="brand-link">
		<img src="/assets-admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Admin panel</span>
	</a>

	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="/assets-admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
					<a href="{{ route('admin.test') }}" class="nav-link">
						<i class="nav-icon far fa-folder-open"></i>
						<p>test</p>
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

				{{-- <li class="nav-item">
							<a href="{{ route('promo-slides.index') }}" class="nav-link">
				<i class="nav-icon fas fa-file"></i>
				<p>Слайдер</p>
				</a>
				</li> --}}



				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-file"></i>
						<p>
							Главная страница
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('promo-slides.index') }}" class="nav-link">
								<i class="nav-icon fas fa-caret-right"></i>
								<p>Промо-слайдер</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">
								<i class="nav-icon fas fa-caret-right"></i>
								<p>************</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">
								<i class="nav-icon fas fa-caret-right"></i>
								<p>************</p>
							</a>
						</li>
					</ul>
				</li>

			</ul>
		</nav>
	</div>
</aside>