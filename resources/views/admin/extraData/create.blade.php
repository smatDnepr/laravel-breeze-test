@extends('admin.layout')

@section('title', 'Дополнительные данные')

@section('content')
	<div class="card card-primary card-outline mb-0">
		<form action="{{ route('extra-data.store') }}" method="post">
			@csrf
			@method('post')
			<div class="card-body p-0">
				<table class="table">
					<thead>
						<tr>
							<th style="width:300px">Параметр</th>
							<th>Значение</th>
						</tr>
					</thead>
					<tbody class="tbody-sortable">
						<tr>
							<td>
								<input type="text" name="param" class="form-control @error('param') is-invalid @enderror" value="{{ old('param') }}" placeholder="">
							</td>
							<td>
								<input type="text" name="value" class="form-control @error('value') is-invalid @enderror" value="{{ old('value') }}" placeholder="">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<a class="btn btn-outline-primary" href="{{ route('extra-data.index') }}">Назад</a>
				<button type="submit" class="btn btn-primary">Сохранить</button>
			</div>
		</form>
	</div>
@endsection