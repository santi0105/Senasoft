<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="fecha_inicial" class="form-label">{{ __('Fechainicial') }}</label>
            <input type="date" name="fechaInicial" class="form-control @error('fechaInicial') is-invalid @enderror" value="{{ old('fechaInicial', $alquilere?->fechaInicial) }}" id="fecha_inicial" placeholder="Fechainicial">
            {!! $errors->first('fechaInicial', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_final" class="form-label">{{ __('Fechafinal') }}</label>
            <input type="date" name="fechaFinal" class="form-control @error('fechaFinal') is-invalid @enderror" value="{{ old('fechaFinal', $alquilere?->fechaFinal) }}" id="fecha_final" placeholder="Fechafinal">
            {!! $errors->first('fechaFinal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tp_alquiler" class="form-label">{{ __('Tipo de alquiler') }}</label>
            <select class="form-select" name='tpAlquiler' aria-label="Default select example">
                <option value="hora">Hora</option>
                <option value="semanal">semanal</option>
                <option value="Mensual">Mensual</option>
              </select>
        </div>
   
        <div class="form-group mb-2 mb20">
            <select name="id_users" id="id_users" class="form-control @error('id_users') is-invalid @enderror">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->apellido }}</option>
                @endforeach
            </select>
            
            {!! $errors->first('id_users', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tp_alquiler" class="form-label">{{ __('Bicicletas') }}</label>
            <!-- Campo oculto para id_alquiler -->
            <input type="text" name="id_bicicletas" value="{{ $idBicicletas }}">  
         
            {!! $errors->first('id_bicicletas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>