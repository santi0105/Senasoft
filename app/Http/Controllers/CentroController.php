<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CentroRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CentroController extends Controller
{
    /**
     * mostrar una lista del recurso
     */
    public function index(Request $request): View
    {
        $centros = Centro::paginate();

        return view('centro.index', compact('centros'))
            ->with('i', ($request->input('page', 1) - 1) * $centros->perPage());
    }

    /**
     *crea un nuevo recurso.
     */
    public function create(): View
    {
        $centro = new Centro();

        return view('centro.create', compact('centro'));
    }

    /**
     *  almacena un nuevo recurso.
     */
    public function store(CentroRequest $request): RedirectResponse
    {
        Centro::create($request->validated());

        return Redirect::route('centros.index')
            ->with('success', 'Centro created successfully.');
    }

    /**
     *  muestra los recursos especificos.
     */
    public function show($id): View
    {
        $centro = Centro::find($id);

        return view('centro.show', compact('centro'));
    }

    /**
     * editar el recurso especifico.
     */
    public function edit($id): View
    {
        $centro = Centro::find($id);

        return view('centro.edit', compact('centro'));
    }

    /**
     *actualizar el recurso.
     */
    public function update(CentroRequest $request, Centro $centro): RedirectResponse
    {
        $centro->update($request->validated());

        return Redirect::route('centros.index')
            ->with('success', 'Centro updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Centro::find($id)->delete();

        return Redirect::route('centros.index')
            ->with('success', 'Centro deleted successfully');
    }
}
