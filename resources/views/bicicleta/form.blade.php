<!-- Formulario necesario para cumplir requerimientos del proyecto. Estructura basica html, php laravel -->
<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <strong>Imagen Presentacion</strong>
            <input type="file" accept="image/*" name="img" class="form-control @error('img') is-invalid @enderror" value="{{ old('img', $bicicleta?->img) }}" id="img" placeholder="Img">
            {!! $errors->first('img', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <strong>Marca</strong>
            <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca', $bicicleta?->marca) }}" id="marca" placeholder="Marca">
            {!! $errors->first('marca', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <strong>Color</strong>
            <input type="text" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color', $bicicleta?->color) }}" id="color" placeholder="Color">
            {!! $errors->first('color', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <strong>Precio x Hora</strong>
            <input type="text" name="precioHora" class="form-control @error('precioHora') is-invalid @enderror" value="{{ old('precioHora', $bicicleta?->precioHora) }}" id="precio_hora" placeholder="Preciohora">
            {!! $errors->first('precioHora', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            
            <input type="hidden" name="estado" id="estado" value="estado">
        </div>
        <div class="form-group mb-2 mb20">
            <strong>Centro</strong>
            <select name="id_centros" id="id_centros" class="form-control @error('id_centros') is-invalid @enderror">
                @foreach ($centros as $centro)
                    <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_centros', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Añadir Bicicleta') }}</button>
    </div>
</div>