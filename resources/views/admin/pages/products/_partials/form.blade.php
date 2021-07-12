@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="name">Título:</label>
    <input type="text" name="title" id="title" class="form-control" value="{{$product->title ?? old('title')}}">
</div>
<div class="form-group">
    <label for="name">Preço:</label>
    <input type="text" name="price" id="price" class="form-control" value="{{$product->price ?? old('price')}}">
</div>
<div class="form-group">
    <label for="name">Imagem:</label>
    <input type="file" name="image" id="image" class="form-control">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" id="description" rows="5" class="form-control">{{$product->description ?? old('description')}}</textarea>
</div>