<div class="container text-center">
    <div class="row p-3">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Realizar un Alquiler') }}</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group mb-3">
                            <label for="fecha_inicial" class="form-label">{{ __('Fecha Inicial') }}</label>
                            <input type="date" name="fechaInicial" class="form-control @error('fechaInicial') is-invalid @enderror" value="{{ old('fechaInicial', $alquilere?->fechaInicial) }}" id="fecha_inicial">
                            {!! $errors->first('fechaInicial', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="fecha_final" class="form-label">{{ __('Fecha Final') }}</label>
                            <input type="date" name="fechaFinal" class="form-control @error('fechaFinal') is-invalid @enderror" value="{{ old('fechaFinal', $alquilere?->fechaFinal) }}" id="fecha_final">
                            {!! $errors->first('fechaFinal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>

                        <div class="form-group mb-3">
                            <label for="tp_alquiler" class="form-label">{{ __('Tipo de Alquiler') }}</label>
                            <select class="form-select @error('tpAlquiler') is-invalid @enderror" name='tpAlquiler' id="tp_alquiler">
                                <option value="hora">Hora</option>
                                <option value="semanal">Semanal</option>
                                <option value="mensual">Mensual</option>
                            </select>
                            {!! $errors->first('tpAlquiler', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>

                        <div class="form-group mb-3">
                            <input type="hidden" name="id_users" class="form-select @error('id_users') is-invalid @enderror" value="{{ Auth::user()->id }}">
                        </div>

                        <div class="form-group mb-3">
                            <input type="hidden" name="id_bicicletas" value="{{ $idBicicletas }}" class="form-control" hidden>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">{{ __('Agregar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
