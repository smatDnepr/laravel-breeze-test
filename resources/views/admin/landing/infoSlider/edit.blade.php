@extends('admin.layout')

@section('title', 'Главная - Инфо-слайдер')

@section('content')
	<div class="card-body p-0">
		<form action="{{ route('landing.info-slider.update') }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('put')
			<div class="card-header" style="border:0; padding-bottom:0">
				<h5 class="clear-both">Параметры слайдера</h5>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<thead>
						<tr>
							<th style="width:230px">Фоновая картинка</th>
							<th style="width:400px">Заголовок</th>
							<th>Текст под заголовком</th>
						</tr>
					</thead>
					<tbody>
						<td>
							<div class="form-group">
								<input class="img-input @error('info_slider_bgr') is-invalid  @enderror" type="hidden" name="info_slider_bgr" value="{{ $infoSlider->info_slider_bgr}}" />
								<div class="img-wrap">
									<a href="{{ $infoSlider->info_slider_bgr}}" target="_blank">
										<img src="{{ $infoSlider->info_slider_bgr}}" alt="">
									</a>
								</div>
								<a class="js-choose-img" href="javascript:;">Выбрать картинку</a>
							</div>
						</td>
						<td>
							<input class="form-control @error('info_slider_header') is-invalid  @enderror" name="info_slider_header" value="{{ $infoSlider->info_slider_header}}" />
						</td>
						<td>
							<textarea class="editor-light @error('info_slider_subheader') is-invalid  @enderror" name="info_slider_subheader">{{ $infoSlider->info_slider_subheader}}</textarea>
						</td>
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<a href="{{route('landing.info-slider.show')}}" class="btn btn-outline-primary">Назад</a>
				<button class="btn btn-primary" type="submit">Сохранить изменения</button>
			</div>
		</form>
	</div>
@endsection
