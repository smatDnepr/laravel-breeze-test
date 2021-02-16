@extends('admin.layout')

@section('title', 'Дополнительные данные')

@section('content')
<div class="card card-primary card-outline mb-0">
    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:300px">Параметр</th>
                    <th>Значение</th>
                    <th style="width:150px">Действия</th>
                </tr>
            </thead>
            <tbody class="tbody-sortable">
                @foreach ($exrtaData as $item)
                <tr>
                    <td>
                        {{ $item->param }}
                    </td>
                    <td>
                        {{ $item->value }}
                    </td>
                    <td>
                        <a href="{{ route('extra-data.edit', ['extra_datum' => $item->id]) }}" class="btn btn-sm btn-primary float-left mr-1" title="Редактировать">
                            <i class="fas fa-pen"></i>
                        </a>
                        <form action="{{ route('extra-data.destroy', ['extra_datum' => $item->id]) }}" method="post" class="">
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
        <a class="btn btn-primary" href="{{ route('extra-data.create') }}">Добавить данные</a>
    </div>
</div>
@endsection
