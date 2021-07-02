@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <h4>Ops! Nada feito...</h4>
        <hr>
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

@if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif