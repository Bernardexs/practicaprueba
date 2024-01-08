@if($exito = Session::get('success'))
    <div class="alert alert-success" role="alert">
        <h3>{{ $exito }}</h3>
    </div>
@endif
@if($message = Session::get('fail'))
    <div class="alert alert-success" role="alert">
        <h3>{{ $message}}</h3>
    </div>
@endif

