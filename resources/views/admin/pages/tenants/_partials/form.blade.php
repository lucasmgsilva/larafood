@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$tenant->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="logo">Logo:</label>
    <input type="file" name="logo" id="logo" class="form-control">
</div>
<div class="form-group">
    <label for="cnpj">CNPJ:</label>
    <input type="number" name="cnpj" id="cnpj" class="form-control" value="{{$tenant->cnpj ?? old('cnpj')}}">
</div>
<div class="form-group">
    <label for="active">Ativo?</label>
    <select name="active" id="active">
        <option value="Y" @if (isset($tenant) && $tenant->active == 'Y') selected @endif>Sim</option>
        <option value="N" @if (isset($tenant) && $tenant->active == 'N') selected @endif>Não</option>
    </select>
</div>
<hr>
<h3>Assinatura</h3>
<div class="form-group">
    <div class="form-group">
        <label for="subscription">Data Assinatura:</label>
        <input type="date" name="subscription" id="subscription" class="form-control" value="{{$tenant->subscription ?? old('subscription')}}">
    </div>
    <div class="form-group">
        <label for="expires_at">Expira (final):</label>
        <input type="date" name="expires_at" id="expires_at" class="form-control" value="{{$tenant->expires_at ?? old('expires_at')}}">
    </div>
    <div class="form-group">
        <label for="subscription_id">Identificador:</label>
        <input type="text" name="subscription_id" id="subscription_id" class="form-control" value="{{$tenant->subscription_id ?? old('subscription_id')}}">
    </div>
    <div class="form-group">
        <label for="subscription_active">Assinatura Ativa?</label>
        <select name="subscription_active" id="subscription_active">
            <option value="1" @if (isset($tenant) && $tenant->subscription_active) selected @endif>Sim</option>
            <option value="0" @if (isset($tenant) && !$tenant->subscription_active) selected @endif>Não</option>
        </select>
    </div>
    <div class="form-group">
        <label for="subscription_suspended">Assinatura Cancelada?</label>
        <select name="subscription_suspended" id="subscription_suspended">
            <option value="1" @if (isset($tenant) && $tenant->subscription_suspended) selected @endif>Sim</option>
            <option value="0" @if (isset($tenant) && !$tenant->subscription_suspended) selected @endif>Não</option>
        </select>
    </div>
</div>