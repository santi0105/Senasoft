<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="fecha_inicial" class="form-label">{{ __('Fechainicial') }}</label>
            <input type="text" name="fechaInicial" class="form-control @error('fechaInicial') is-invalid @enderror" value="{{ old('fechaInicial', $alquilere?->fechaInicial) }}" id="fecha_inicial" placeholder="Fechainicial">
            {!! $errors->first('fechaInicial', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_final" class="form-label">{{ __('Fechafinal') }}</label>
            <input type="text" name="fechaFinal" class="form-control @error('fechaFinal') is-invalid @enderror" value="{{ old('fechaFinal', $alquilere?->fechaFinal) }}" id="fecha_final" placeholder="Fechafinal">
            {!! $errors->first('fechaFinal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tp_alquiler" class="form-label">{{ __('Tpalquiler') }}</label>
            <input type="text" name="tpAlquiler" class="form-control @error('tpAlquiler') is-invalid @enderror" value="{{ old('tpAlquiler', $alquilere?->tpAlquiler) }}" id="tp_alquiler" placeholder="Tpalquiler">
            {!! $errors->first('tpAlquiler', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_users" class="form-label">{{ __('Id Users') }}</label>
            <input type="text" name="id_users" class="form-control @error('id_users') is-invalid @enderror" value="{{ old('id_users', $alquilere?->id_users) }}" id="id_users" placeholder="Id Users">
            {!! $errors->first('id_users', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_bicicletas" class="form-label">{{ __('Id Bicicletas') }}</label>
            <input type="text" name="id_bicicletas" class="form-control @error('id_bicicletas') is-invalid @enderror" value="{{ old('id_bicicletas', $alquilere?->id_bicicletas) }}" id="id_bicicletas" placeholder="Id Bicicletas">
            {!! $errors->first('id_bicicletas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>