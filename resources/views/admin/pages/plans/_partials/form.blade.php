@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$plan->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="name">Preço:</label>
    {{-- [0-9]+([,\.][0-9]+)? --}}
    <input type="number" pattern="/^\d+(\.\d{1,2})?$/" min="0" step="any" name="price" id="price" class="form-control" value="{{$plan->price ?? old('price')}}">
</div>
<div class="form-group">
    <label for="name">Descrição:</label>
    <textarea name="description" id="description" rows="3" class="form-control">{{$plan->description ?? old('description')}}</textarea>
</div>