@extends('admin.layout')

@section('title', 'Партнеры')

@section('content')
<div class="card card-primary card-outline mb-0">
	<div class="card-header">
        <a class="btn btn-primary" href="{{ route('partners.create') }}" style="border-top:0 !important">Добавить партнера</a>
    </div>
    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
					<th style="width:100px">Логотип</th>
                    <th>Название</th>
					<th>Ссылка</th>
					<th style="width:150px">Действия</th>
                </tr>
            </thead>
            <tbody class="tbody-sortable">
                @foreach ($partners as $partner)
                <tr>
					<td>
                        <a class="" href="{{ $partner->logo }}" target="_blank">
							<img src="{{ $partner->logo }}" alt="" style="width:100px" title="Посмотреть в отдельном окне" />
						</a>
                    </td>
                    <td>
                        {{ $partner->title }}
                    </td>
					<td>
						<a href="{{ $partner->link }}" target="_blank">{{ $partner->link }}</a>
                    </td>
                    <td>
                        <a href="{{ route('partners.edit', ['partner' => $partner->id]) }}" class="btn btn-sm btn-primary float-left mr-1" title="Редактировать">
                            <i class="fas fa-pen"></i>
                        </a>
                        <form action="{{ route('partners.destroy', ['partner' => $partner->id]) }}" method="post" class="">
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
        <a class="btn btn-primary" href="{{ route('partners.create') }}">Добавить партнера</a>
    </div>
</div>
@endsection
