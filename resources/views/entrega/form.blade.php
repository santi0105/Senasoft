<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2">
            <!-- Campo oculto para id_alquiler -->
            <input type="hidden" name="id_alquileres" value="{{ $idAlquileres }}">
            {!! $errors->first('id_alquileres', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-3">
            <label for="valor_pagar" class="form-label">{{ __('Valor a Pagar') }}</label>
            <input type="number" name="valorPagar" class="form-control" id="valor_pagar" placeholder="Ingrese el valor a pagar" oninput="calcularDescuento()">
            <div class="invalid-feedback">
                {{ $errors->first('valorPagar') }}
            </div>
        </div>
        
        <div class="form-group mb-3">
            <label for="tarifa_adicional" class="form-label">{{ __('Descuento') }}</label>
            <input type="text" name="tarifaAdicional" class="form-control" id="tarifa_adicional" readonly>
        </div>
        
        <div class="form-group mb-3">
            <label for="total_final" class="form-label">{{ __('Total a Pagar') }}</label>
            <input type="text" name="totalPagar" class="form-control" id="total_final" readonly>
        </div>
        
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-success">{{ __('Enviar') }}</button>
        </div>
    </div>
</div>

<!-- Script para calcular el descuento -->
<script>
    function calcularDescuento() {
        // Obtener el valor a pagar
        const valorPagar = parseFloat(document.getElementById('valor_pagar').value) || 0;

        // Definir el porcentaje de descuento según el estrato
        const estrato = {{ Auth::user()->estrato }}; // Puedes pasarlo desde PHP
        let descuentoPorcentaje = 0;

        if (estrato == 1 || estrato == 2) {
            descuentoPorcentaje = 0.10; // 10%
        } else if (estrato == 3 || estrato == 4) {
            descuentoPorcentaje = 0.05; // 5%
        } else {
            descuentoPorcentaje = 0.00; // 0%
        }

        // Calcular el descuento
        const descuento = valorPagar * descuentoPorcentaje;

        // Actualizar el campo de descuento
        document.getElementById('tarifa_adicional').value = descuento.toFixed(2);

        // Calcular el total a pagar
        const totalFinal = valorPagar - descuento;
        document.getElementById('total_final').value = totalFinal.toFixed(2);
    }
</script>
