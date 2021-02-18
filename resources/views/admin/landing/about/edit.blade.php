@extends('admin.layout')

@section('title', 'Главная - Обо мне')

@section('content')
	<div class="card-body p-0">
		<form action="{{ route('landing.about.update') }}" method="post">
			@csrf
			@method('put')
			<div class="card-body p-0">
				<table class="table">
					<thead>
						<tr>
							<th style="width:200px">Картинка</th>
							<th>Текст</th>
						</tr>
					</thead>
					<tbody class="tbody-sortable">
						<tr>
							<td>
								<div class="form-group">
									<input class="img-input @error('about_img') is-invalid @enderror" type="hidden" name="about_img" value="{{ $about->about_img }}" />
									<div class="img-wrap">
										<a class="" href="{{ $about->about_img ?? asset('assets/img/no-image.png') }}" target="_blank">
											<img src="{{ $about->about_img ?? asset('assets/img/no-image.png') }}" style="width:150px" alt="">
										</a>
									</div>
									<a href="javascript:;" class="js-choose-img">Выбрать картинку</a>
								</div>
							</td>
							<td>
								<textarea name="about_text" class="editor-light form-control @error('about_text') is-invalid @enderror" rows="5">{{ $about->about_text }}</textarea>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Сохранить</button>
			</div>
		</form>
	</div>
@endsection