@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$user->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" class="form-control" value="{{$user->email ?? old('email')}}">
</div>
<div class="form-group">
    <label for="password">Senha:</label>

    <input type="password" name="password" id="password" class="form-control">
</div>