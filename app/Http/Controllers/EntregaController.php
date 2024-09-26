<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Alquilere;
use App\Models\Bicicleta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EntregaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;

class EntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
{
    $entregas = Entrega::paginate();

    // Calcular ganancias mensuales
    $mes = now()->format('n');
    $anio = now()->format('Y');
    $gananciasMensuales = array_fill(1, 12, 0); // Inicializa con ceros

    for ($i = 1; $i <= 12; $i++) {
        $inicio = Carbon::create($anio, $i, 1);
        $fin = $inicio->copy()->endOfMonth();
    
        $gananciasMensuales[$i] = Entrega::whereBetween('created_at', [$inicio, $fin])
            ->sum('totalPagar');
    }
        


    for ($i = 1; $i <= 12; $i++) {
        $inicio = Carbon::create($anio, $i, 1);
        $fin = $inicio->copy()->endOfMonth();

        $gananciasMensuales[$i] = Entrega::whereBetween('created_at', [$inicio, $fin]) //Se realiza una consulta en la BD para comparar fechas
            ->sum('totalPagar');
    }

    return view('entrega.index', compact('entregas', 'gananciasMensuales'))
        ->with('i', ($request->input('page', 1) - 1) * $entregas->perPage());
}

    

    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $entrega = new Entrega();
        $idAlquileres = $request->input('id_alquileres');
      
        return view('entrega.create', compact('entrega','idAlquileres'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(EntregaRequest $request): RedirectResponse
{
    $data = $request->validated();
    $data['id_alquileres'] = $request->input('id_alquileres');

    // Crear la entrega
    $entrega = Entrega::create($data);

    // Encontrar el alquiler asociado
    $alquiler = Alquilere::find($data['id_alquileres']);
    
    if ($alquiler) {
        // Buscar la bicicleta asociada al alquiler
        $bicicleta = Bicicleta::find($alquiler->id_bicicletas);
        
        // Actualizar el estado de la bicicleta a activa
        if ($bicicleta) {
            $bicicleta->update(['estado' => 'Activa']);
        }
    }

    return Redirect::route('entregas.index')
        ->with('success', 'Entrega Registrada y Bicicleta nuevamente Activada.');
}



    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $entrega = Entrega::find($id);

        return view('entrega.show', compact('entrega'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $entrega = Entrega::find($id);

        return view('entrega.edit', compact('entrega'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntregaRequest $request, Entrega $entrega): RedirectResponse
    {
        $entrega->update($request->validated());

        return Redirect::route('entregas.index')
            ->with('success', 'Entrega updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Entrega::find($id)->delete();

        return Redirect::route('entregas.index')
            ->with('success', 'Entrega deleted successfully');
    }
}
