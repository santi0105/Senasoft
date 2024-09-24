    <div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            
                <label for="id_alquileres" class="form-label">{{ __('Id Alquileres') }}</label>
                <select name="id_alquileres" id="id_alquileres" class="form-control @error('id_alquileres') is-invalid @enderror">
                    @foreach ($alquileres as $alquilere)
                        <option value="{{ $alquilere->id }}">{{ $alquilere->id }}</option>
                    @endforeach
                </select>
                {!! $errors->first('id_alquileres', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            
        </div>
        <div class="form-group mb-2 mb20">
            <label for="valor_pagar" class="form-label">{{ __('Valorpagar') }}</label>
            <input type="text" name="valorPagar" class="form-control @error('valorPagar') is-invalid @enderror" value="{{ old('valorPagar', $entrega?->valorPagar) }}" id="valor_pagar" placeholder="Valorpagar">
            {!! $errors->first('valorPagar', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tarifa_adicional" class="form-label">{{ __('Tarifaadicional') }}</label>
            @php
                $estrato = Auth::user()->estrato;
                if($estrato == 1 OR $estrato == 2){
            @endphp
                    <input type="text" name="tarifaAdicional" class="form-control @error('tarifaAdicional') is-invalid @enderror" value="10%" id="tarifa_adicional" >
            @php
                }else if($estrato == 3 OR $estrato == 4){
            @endphp
                <input type="text" name="tarifaAdicional" class="form-control @error('tarifaAdicional') is-invalid @enderror" value="5%" id="tarifa_adicional" >
            @php
                }else{
            @endphp
                    <input type="text" name="tarifaAdicional" class="form-control @error('tarifaAdicional') is-invalid @enderror" value="0%" id="tarifa_adicional" >
            @php
                }
            @endphp
            <input type="text" name="tarifaAdicional" class="form-control @error('tarifaAdicional') is-invalid @enderror" value="{{ old('tarifaAdicional', $entrega?->tarifaAdicional) }}" id="tarifa_adicional" placeholder="Tarifaadicional">
            {!! $errors->first('tarifaAdicional', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>