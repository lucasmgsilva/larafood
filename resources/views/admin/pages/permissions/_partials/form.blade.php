@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$permission->name ?? old('name')}}">
    
    <label for="description">Descrição:</label>
    <textarea name="description" id="description" rows="3" class="form-control">{{$permission->description ?? old('description')}}</textarea>
</div>