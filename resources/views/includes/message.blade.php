@if ($errors->any())

@foreach ($errors->all() as $error)
    <div class="alert-iroc alert-danger-iroc my-1">
        <p><b>{{ $error }}</b></p>
    </div>
@endforeach

@endif

@if(session()->has('success'))
    <div class="alert-iroc alert-success-iroc my-1">
        <p><b>{{ session()->get('success') }}</b></p>
    </div>
@endif


@if(session()->has('update'))
    <div class="alert-iroc alert-update-iroc my-1">
        <p><b>{{ session()->get('update') }}</b></p>
    </div>
@endif


@if(session()->has('delete'))
    <div class="alert-iroc alert-danger-iroc my-1">
        <p><b>{{ session()->get('delete') }}</b></p>
    </div>
@endif
