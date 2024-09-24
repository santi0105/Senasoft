<?php

namespace App\Http\Controllers;

use App\Models\Estadistica;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EstadisticaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EstadisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $estadisticas = Estadistica::paginate();

        return view('estadistica.index', compact('estadisticas'))
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
