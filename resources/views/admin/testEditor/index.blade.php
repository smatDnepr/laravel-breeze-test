@extends('admin.layout')


@section('title', 'Редактор')


@section('content')
<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control" id="textarea_content"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
