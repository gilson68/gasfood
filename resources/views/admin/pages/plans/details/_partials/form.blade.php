@include('admin.includes.alerts')
@csrf
<div class="form-row">
    <div class="form-group col-md-6">
        <label>* Nome:</label>
        <input type="text" name="name" class="form-control" value="{{ $detail->name ?? old('name') }}" placeholder="Nome">
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <button type="submit" class="btn btn-outline-success btn-lg">Enviar</button>
    </div>
</div>
