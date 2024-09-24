<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $centro?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="regional" class="form-label">{{ __('Regional') }}</label>
            <input type="text" name="regional" class="form-control @error('regional') is-invalid @enderror" value="{{ old('regional', $centro?->regional) }}" id="regional" placeholder="Regional">
            {!! $errors->first('regional', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="latitud" class="form-label">{{ __('Latitud') }}</label>
            <input type="text" name="latitud" class="form-control @error('latitud') is-invalid @enderror" value="{{ old('latitud', $centro?->latitud) }}" id="latitud" placeholder="Latitud">
            {!! $errors->first('latitud', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="longitud" class="form-label">{{ __('Longitud') }}</label>
            <input type="text" name="longitud" class="form-control @error('longitud') is-invalid @enderror" value="{{ old('longitud', $centro?->longitud) }}" id="longitud" placeholder="Longitud">
            {!! $errors->first('longitud', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>