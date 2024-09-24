<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="img" class="form-label">{{ __('Img') }}</label>
            <input type="file" accept="image/*" name="img" class="form-control @error('img') is-invalid @enderror" value="{{ old('img', $bicicleta?->img) }}" id="img" placeholder="Img">
            {!! $errors->first('img', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="marca" class="form-label">{{ __('Marca') }}</label>
            <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca', $bicicleta?->marca) }}" id="marca" placeholder="Marca">
            {!! $errors->first('marca', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="color" class="form-label">{{ __('Color') }}</label>
            <input type="text" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color', $bicicleta?->color) }}" id="color" placeholder="Color">
            {!! $errors->first('color', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $bicicleta?->estado) }}">
                <option value="Inactiva">Inactiva</option>
                <option value="Activa">Activa</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio_hora" class="form-label">{{ __('Preciohora') }}</label>
            <input type="text" name="precioHora" class="form-control @error('precioHora') is-invalid @enderror" value="{{ old('precioHora', $bicicleta?->precioHora) }}" id="precio_hora" placeholder="Preciohora">
            {!! $errors->first('precioHora', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_centros" class="form-label">{{ __('Id Centros') }}</label>
            <input type="text" name="id_centros" class="form-control @error('id_centros') is-invalid @enderror" value="{{ old('id_centros', $bicicleta?->id_centros) }}" id="id_centros" placeholder="Id Centros">
            {!! $errors->first('id_centros', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>