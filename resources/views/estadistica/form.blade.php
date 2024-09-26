<!-- Este modulo no se IMPLEMENTO -->
<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_alquileres" class="form-label">{{ __('Id Alquileres') }}</label>
            <input type="text" name="id_alquileres" class="form-control @error('id_alquileres') is-invalid @enderror" value="{{ old('id_alquileres', $estadistica?->id_alquileres) }}" id="id_alquileres" placeholder="Id Alquileres">
            {!! $errors->first('id_alquileres', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_entregas" class="form-label">{{ __('Id Entregas') }}</label>
            <input type="text" name="id_entregas" class="form-control @error('id_entregas') is-invalid @enderror" value="{{ old('id_entregas', $estadistica?->id_entregas) }}" id="id_entregas" placeholder="Id Entregas">
            {!! $errors->first('id_entregas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>