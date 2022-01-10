@include('admin.includes.alerts')
@csrf
<div class="form-row">
    <div class="form-group col-md-6">
        <label>* Perfil:</label>
        <input type="text" name="name" class="form-control" value="{{ $profile->name ?? old('name') }}" placeholder="Perfil">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label>* Descrição:</label>
        <textarea name="description" cols="30" rows="5" class="form-control">{{ $profile->description ?? old('description') }}</textarea>
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <button type="submit" class="btn btn-outline-success btn-lg">ENVIAR</button>
    </div>
</div>
