<?php

namespace App\Http\Controllers;

use App\Models\Estadistica;
use App\Models\Alquilere;
use App\Models\Entrega;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EstadisticaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use ConsoleTVs\Charts\Facades\Chart;
use Carbon\Carbon;

class EstadisticaController extends Controller
{
   
    public function index(Request $request): View
    {
        // Calcular ganancias mensuales
        $mes = now()->format('n');
        $anio = now()->format('Y');
        $gananciasMensuales = [];
    
        for ($i = 1; $i <= 12; $i++) {
            $inicio = Carbon::create($anio, $i, 1);
            $fin = $inicio->copy()->endOfMonth();
    
            $gananciasMensuales[$i] = Entrega::whereBetween('created_at', [$inicio, $fin])
                ->sum('totalPagar');
        }
    
        $estadisticas = Estadistica::paginate();

        return view('estadistica.index', compact('estadisticas','gananciasMensuales'))
            ->with('i', ($request->input('page', 1) - 1) * $estadisticas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $estadistica = new Estadistica();

        return view('estadistica.create', compact('estadistica'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstadisticaRequest $request): RedirectResponse
    {
        Estadistica::create($request->validated());

        return Redirect::route('estadisticas.index')
            ->with('success', 'Estadistica created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $estadistica = Estadistica::find($id);

        return view('estadistica.show', compact('estadistica'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $estadistica = Estadistica::find($id);

        return view('estadistica.edit', compact('estadistica'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstadisticaRequest $request, Estadistica $estadistica): RedirectResponse
    {
        $estadistica->update($request->validated());

        return Redirect::route('estadisticas.index')
            ->with('success', 'Estadistica updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Estadistica::find($id)->delete();

        return Redirect::route('estadisticas.index')
            ->with('success', 'Estadistica deleted successfully');
    }
}
