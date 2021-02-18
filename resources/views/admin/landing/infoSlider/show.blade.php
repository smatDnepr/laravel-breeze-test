@extends('admin.layout')

@section('title', 'Главная - Инфо-слайдер')

@section('content')
	<div class="card-body p-0">
		<div class="card-header" style="border:0; padding-bottom:0">
			<h5 class="clear-both">Параметры слайдера</h5>
		</div>
		
		<div class="card-body p-0">
			<table class="table">
				<thead>
					<tr>
						<th style="width:230px">Фоновая картинка</th>
						<th style="width:360px">Заголовок</th>
						<th>Текст под заголовком</th>
						<th style="width:150px">Действия</th>
					</tr>
				</thead>
				<tbody>
					<td>
						<img src="{{ $infoSlider->info_slider_bgr}}" style="width:150px" alt="">
					</td>
					<td>
						{{ $infoSlider->info_slider_header}}
					</td>
					<td>
						{!! $infoSlider->info_slider_subheader !!}
					</td>
					<td>
						<a href="{{ route('landing.info-slider.edit') }}" class="btn btn-sm btn-primary float-left mr-1" title="Редактировать">
							<i class="fas fa-pen"></i>
						</a>
					</td>
				</tbody>
			</table>
		</div>
		<div class="card-header"></div>
	</div>

	<div class="card-body p-0">
		<div class="card-header" style="border:0; padding-bottom:0">
			<h5 class="clear-both">Список слайдов</h5>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-body p-0">
					<div class="card-body p-0">
						<table class="table">
							<thead>
								<tr>
									<th style="width:50px">id</th>
									<th style="width:180px">SVG-иконка</th>
									<th style="width:360px">Заголовок</th>
									<th>Текст</th>
									<th style="width:150px">Действия</th>
								</tr>
							</thead>
							<tbody class="tbody-sortable ui-sortable" data-ajax-sort-url="{{ route('landing.sort-info-slides') }}">
								@foreach($infoSlideList as $infoSlide)
									<tr data-id="{{ $infoSlide->id }}">
										<td class="id ui-sortable-handle">
											{{ $infoSlide->id }}
										</td>
										<td>
											<a class="" href="{{ $infoSlide->ico }}" target="_blank">
												<img src="{{ $infoSlide->ico }}" alt="" style="width:80px" title="Посмотреть в отдельном окне">
											</a>
										</td>
										<td>
											{{ $infoSlide->title }}
										</td>
										<td>
											{{ $infoSlide->text }}
										</td>
										<td>
											<a href="{{ route('landing.info-slides.edit', $infoSlide->id) }}" class="btn btn-sm btn-primary float-left mr-1" title="Редактировать">
												<i class="fas fa-pen"></i>
											</a>
											<form action="{{ route('landing.info-slides.destroy', $infoSlide->id) }}" method="post">
												@csrf
												@method('delete')
												<button type="submit" class="btn btn-sm btn-danger" title="Удалить" onclick="return confirm('Подтвердите удаление')">
													<i class="fas fa-trash-alt"></i>
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="card-footer">
						<a class="btn btn-primary" href="{{ route('landing.info-slides.create') }}">Добавить слайд</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
