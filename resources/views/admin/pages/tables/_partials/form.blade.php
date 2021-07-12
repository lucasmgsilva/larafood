@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="name">Identificador:</label>
    <input type="text" name="identify" id="identify" class="form-control" value="{{$table->identify ?? old('identify')}}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" id="description" rows="5" class="form-control">{{$table->description ?? old('description')}}</textarea>
</div>