@include('admin.includes.alerts')
@csrf
<div class="form-row">
    <div class="form-group col-md-6">
        <label>* Permissão:</label>
        <input type="text" name="name" class="form-control" value="{{ $permission->name ?? old('name') }}" placeholder="Permissão">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label>* Descrição:</label>
        <textarea name="description" cols="30" rows="5" class="form-control">{{ $permission->description ?? old('description') }}</textarea>
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <button type="submit" class="btn btn-outline-success btn-lg">ENVIAR</button>
    </div>
</div>
