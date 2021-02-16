@extends('admin.layout')

@section('title', "Редактирование слайда #$slide->id")

@section('content')
<div class="card-body p-0">
    <form action="{{ route('promo-slides.update', ['promo_slide' => $slide->id]) }}" method="post">
        @csrf
        @method('put')
		
		<div class="card-header">
			<button class="btn btn-outline-primary" type="button" onclick="window.location.href='{{ route('promo-slides.index') }}'; return false;">Назад</button>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
		</div>
		
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Картинка слайда</label>
                        <input class="img-input" type="hidden" name="img" value="{{ $slide->img }}" />
                        <div class="img-wrap">
                            <a class="img" href="{{ $slide->img }}" target="_blank">
                                <img src="{{ $slide->img }}" alt="">
                            </a>
                        </div>
                        <a href="javascript:;" class="js-choose-img">Выбрать другую картинку</a>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Заголовок слайда</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $slide->title }}" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Текст слайда</label>
                        <textarea name="text" class="form-control" rows="3" placeholder="">{{ $slide->text }}</textarea>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group js-slide-btn-functional">
                        <label>Функционал кнопки</label>
                        <div class="form-group" style="margin-bottom: 30px">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <label class="form-check-label" style="cursor: pointer">
                                            <input class="form-check-input" style="cursor: pointer" type="radio" name="btn_functional" value="0" @if ( $slide->btn_functional === 0 || old('btn_functional') == null || old('btn_functional') == '0')
                                            checked="checked"
                                            @endif

                                            {{-- @if ( old('btn_functional') == null || old('btn_functional') == '0' )
															checked="checked"
														@endif --}}
                                            />
                                            Форма для связи
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <label class="form-check-label" style="cursor: pointer">
                                            <input class="form-check-input" style="cursor: pointer" type="radio" name="btn_functional" value="1" @if ( $slide->btn_functional === 1 || old('btn_functional') == '1' )
                                            checked="checked"
                                            @endif
                                            />
                                            Ссылка на портфолио
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group js-btn-link" style="display: none;">
                            <label>Ссылка кнопки</label>
                            <input type="text" name="btn_link" class="form-control @error('btn_link') is-invalid @enderror" value="{{ $slide->btn_link }}" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
        <div class="card-footer">
			<a class="btn btn-outline-primary" href="{{ route('promo-slides.index') }}">Назад</a>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </div>
    </form>
</div>
@endsection
