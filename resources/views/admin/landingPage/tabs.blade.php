<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link @if(Str::of(request()->route()->uri)->contains('admin/promo-slides')) active @endif"
			href="{{ route('promo-slides.index') }}">
			Промо-слайдер
		</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">2222222</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">3333333</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">4444444</a>
    </li>
</ul>
