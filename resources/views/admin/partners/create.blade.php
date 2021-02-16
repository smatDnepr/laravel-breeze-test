@extends('admin.layout')

@section('title', 'Новый партнер')

@section('content')
	<div class="card card-primary card-outline mb-0">
		<form action="{{ route('partners.store') }}" method="post">
			@csrf
			@method('post')
			<div class="card-body p-0">
				<table class="table">
					<thead>
						<tr>
							<th style="width:200px">Логотип</th>
							<th>Название</th>
							<th>Ссылка</th>
						</tr>
					</thead>
					<tbody class="tbody-sortable">
						<tr>
							<td>
								<div class="form-group">
									<input class="img-input @error('logo') is-invalid @enderror" type="hidden" name="logo" value="{{ old('logo') }}" />
									<div class="img-wrap">
										<a class="img js-choose-img" href="{{ old('logo') ?? asset('assets/img/no-image.png') }}" target="_blank">
											<img src="{{ old('logo') ?? asset('assets/img/no-image.png') }}" alt="">
										</a>
									</div>
									<a href="javascript:;" class="js-choose-img">Выбрать картинку</a>
								</div>
							</td>
							<td>
								<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="">
							</td>
							<td>
								<input type="text" name="link" class="form-control" value="{{ old('link') }}" placeholder="">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<a class="btn btn-outline-primary" href="{{ route('partners.index') }}">Назад</a>
				<button type="submit" class="btn btn-primary">Сохранить</button>
			</div>
		</form>
	</div>
@endsection