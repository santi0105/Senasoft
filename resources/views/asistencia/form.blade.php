<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="asiste" class="form-label">{{ __('Asiste') }}</label>
            <select name="asiste" id="asiste" class="form-control @error('asiste') is-invalid @enderror">
                <option value="asiste">Asiste</option>
                <option value="no asiste">No Asiste</option>
            </select>
            {!! $errors->first('asiste', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_users" class="form-label">{{ __('Usuario') }}</label>
            <input type="hidden" name="id_users" class="form-control @error('id_users') is-invalid @enderror" value="{{ Auth::user()->id }}" id="id_users" placeholder="Id Users">
            <input type="text" class="form-control @error('id_users') is-invalid @enderror" value="{{ Auth::user()->name }}" disabled placeholder="Nombre"><br>
            <input type="text" class="form-control @error('id_users') is-invalid @enderror" value="{{ Auth::user()->apellido }}" disabled placeholder="Apellido"><br>
            <input type="text" class="form-control @error('id_users') is-invalid @enderror" value="{{ Auth::user()->documento }}" disabled placeholder="Documento"><br>
            <input type="text" class="form-control @error('id_users') is-invalid @enderror" value="{{ Auth::user()->regional }}" disabled placeholder="Regional">
            {!! $errors->first('id_users', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <input type="hidden" name="id_eventos" class="form-control @error('id_eventos') is-invalid @enderror" value="{{ $idEventos }}" id="id_eventos" placeholder="Id Eventos">
            {!! $errors->first('id_eventos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>