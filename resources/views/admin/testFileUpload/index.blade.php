@extends('admin.layout')


@section('title', 'Загрузка файлов')


@section('content')
    <section class="content">
        <div class="col-sm-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="img-wrap">
                                    <a class="img no-img" href="{{ asset('assets/img/no-image.png') }}" target="_blank">
                                        <img src="{{ asset('assets/img/no-image.png') }}" alt="">
                                    </a>
                                    <div class="file-name"></div>
                                </div>
								<button type="button" class="btn btn-primary js-choose-img">Выбрать картинку</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
