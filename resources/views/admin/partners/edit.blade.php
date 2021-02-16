@extends('admin.layout')

@section('title', 'Редактировать партнера')

@section('content')
	<div class="card card-primary card-outline mb-0">
		<form action="{{ route('partners.update', ['partner' => $partner->id]) }}" method="post">
			@csrf
			@method('put')
			<div class="card-body p-0">
				<table class="table">
					<thead>
						<tr>
							<th style="width:100px">Логотип</th>
							<th>Название</th>
							<th>Ссылка</th>
						</tr>
					</thead>
					<tbody class="tbody-sortable">
						<tr>
							<td>
								<div class="form-group">
									<input class="img-input @error('logo') is-invalid @enderror" type="hidden" name="logo" value="{{ $partner->logo }}" />
									<div class="img-wrap">
										<a class="img js-choose-img" href="{{ $partner->logo ?? asset('assets/img/no-image.png') }}" target="_blank">
											<img src="{{ $partner->logo ?? asset('assets/img/no-image.png') }}" style="width:150px" alt="">
										</a>
									</div>
									<a href="javascript:;" class="js-choose-img">Выбрать картинку</a>
								</div>
							</td>
							<td>
								<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $partner->title }}" placeholder="">
							</td>
							<td>
								<input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ $partner->link }}" placeholder="">
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