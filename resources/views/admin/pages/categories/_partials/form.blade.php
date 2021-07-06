@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$category->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" id="description" rows="5" class="form-control">{{$category->description ?? old('description')}}</textarea>
</div>