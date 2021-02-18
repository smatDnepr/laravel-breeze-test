@extends('admin.layout')

@section('title', 'Главная - Промо-слайдер')

@section('content')
	<div class="card-body p-0">
		<div class="card-header">
			<a class="btn btn-primary" href="{{ route('landing.promo-slides.create') }}" style="border-top:0 !important">Добавить слайд</a>
		</div>
		<div class="card-body p-0">
			<table class="table">
				<thead>
					<tr>
						<th style="width:50px">id</th>
						<th style="width:100px">Картинка</th>
						<th>Заголовок</th>
						<th>Текст</th>
						<th style="width:250px">Кнопка</th>
						<th style="width:150px">Действия</th>
					</tr>
				</thead>
				<tbody class="tbody-sortable" data-ajax-sort-url="{{ route('landing.sort-promo-slides') }}">
					@foreach ($slides as $slide)
					<tr data-id="{{ $slide->id }}">
						<td class="id">
							{{ $slide->id }}
						</td>
						<td>
							<a class="" href="{{ $slide->img }}" target="_blank">
								<img src="{{ $slide->img }}" alt="" style="width:100px" title="Посмотреть в отдельном окне" />
							</a>
						</td>
						<td>
							{{ $slide->title }}
						</td>
						<td>
							{{ $slide->text }}
						</td>
						<td>
							@if ( $slide->btn_functional === 0 )
							<b>Функционал:</b><br>
							Форма для связи
							@elseif ( $slide->btn_functional === 1 )
							<b>Функционал:</b><br>
							<a class="" href="{{ $slide->btn_link }}" target="_blank">Ссылка на портфолио</a>
							@else
							нет данных :(
							@endif
						</td>
						<td>
							<a href="{{ route('landing.promo-slides.edit', ['promo_slide' => $slide->id]) }}" class="btn btn-sm btn-primary float-left mr-1" title="Редактировать">
								<i class="fas fa-pen"></i>
							</a>
							<form action="{{ route('landing.promo-slides.destroy', ['promo_slide' => $slide->id]) }}" method="post" class="">
								@csrf
								@method('DELETE')
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
			<a class="btn btn-primary" href="{{ route('landing.promo-slides.create') }}">Добавить слайд</a>
		</div>
	</div>
@endsection
