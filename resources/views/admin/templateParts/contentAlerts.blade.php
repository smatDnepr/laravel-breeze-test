<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul class="list-unstyled mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session()->has('error'))
                <div class="alert alert-danger mt-2">
                    {{ session('error') }}
                </div>
                @endif

                @if(session()->has('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
