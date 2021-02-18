@extends('admin.layout')

@section('title', "Радактирование слайда")

@section('content')
<div class="card-body p-0">
    <form action="{{ route('landing.info-slides.update', $infoSlide->id) }}" method="post">
        @csrf
        @method('put')
		
		<div class="card-header">
			<a class="btn btn-outline-primary btn-back" type="button" href="{{ route('landing.info-slider.show') }}">Назад</a>
            <button type="submit" class="btn btn-primary">Сохранить</button>
		</div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>SVG иконка слайда</label>
                        <input class="img-input @error('ico') is-invalid @enderror" type="hidden" name="ico" value="{{ $infoSlide->ico }}" />
                        <div class="img-wrap">
                            <a class="img js-choose-img" href="{{ old('ico') ?? asset('assets/img/no-image.png') }}" target="_blank">
                                <img src="{{ $infoSlide->ico }}" alt="">
                            </a>
                        </div>
                        <a href="javascript:;" class="js-choose-img">Выбрать картинку</a>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Заголовок слайда</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $infoSlide->title }}" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Текст слайда</label>
                        <textarea name="text" class="form-control @error('text') is-invalid @enderror" rows="3" placeholder="">{{ $infoSlide->text}}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
			<a class="btn btn-outline-primary btn-back" type="button" href="{{ route('landing.info-slider.show') }}">Назад</a>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
		
    </form>
</div>
@endsection
