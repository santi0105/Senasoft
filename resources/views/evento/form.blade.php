<!-- formulario para evitar quema de codigo -->
<div class="row padding-1 p-1">
    <div class="col-md-12">
        
         <div class="form-group mb-2 mb20">
            <label for="img" class="form-label">{{ __('Img') }}</label>
            <input type="file" accept="image/*" name="img" class="form-control @error('img') is-invalid @enderror" value="{{ old('img', $evento?->img) }}" id="img" placeholder="Img">
            {!! $errors->first('img', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_evento" class="form-label">{{ __('Nombreevento') }}</label>
            <input type="text" name="nombreEvento" class="form-control @error('nombreEvento') is-invalid @enderror" value="{{ old('nombreEvento', $evento?->nombreEvento) }}" id="nombre_evento" placeholder="Nombreevento">
            {!! $errors->first('nombreEvento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $evento?->fecha) }}" id="fecha" placeholder="Fecha">
            {!! $errors->first('fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hora" class="form-label">{{ __('Hora') }}</label>
            <input type="time" name="hora" class="form-control @error('hora') is-invalid @enderror" value="{{ old('hora', $evento?->hora) }}" id="hora" placeholder="Hora">
            {!! $errors->first('hora', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lugar" class="form-label">{{ __('Lugar') }}</label>
            <input type="text" name="lugar" class="form-control @error('lugar') is-invalid @enderror" value="{{ old('lugar', $evento?->lugar) }}" id="lugar" placeholder="Lugar">
            {!! $errors->first('lugar', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <input type="hidden" name="id_users" class="form-control @error('id_users') is-invalid @enderror" value="{{ Auth::user()->id }}" id="id_users" placeholder="Id Users">
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>