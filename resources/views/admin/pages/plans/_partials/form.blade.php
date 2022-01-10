@include('admin.includes.alerts')
@csrf
<div class="form-row">
    <div class="form-group col-md-6">
        <label>* Plano:</label>
        <input type="text" name="name" class="form-control" value="{{ $plan->name ?? old('name') }}" placeholder="Plano">
    </div>

    <div class="form-group col-md-6">
        <label>* Preço:</label>
        <input type="text" name="price" class="form-control" value="{{ $plan->price ?? old('price') }}" placeholder="Preço">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label>* Descrição:</label>
        <textarea name="description" cols="30" rows="5" class="form-control">{{ $plan->description ?? old('description') }}</textarea>
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <button type="submit" class="btn btn-outline-success btn-lg">ENVIAR</button>
    </div>
</div>
