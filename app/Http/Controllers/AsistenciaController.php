<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsistenciaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsistenciaController extends Controller
{
    /**
     * mostrar una lista del recurso
     */
    public function index(Request $request): View
    {
        $asistencias = Asistencia::paginate();

        return view('asistencia.index', compact('asistencias'))
            ->with('i', ($request->input('page', 1) - 1) * $asistencias->perPage());
    }

    /**
     * crea un nuevo recurso.
     */
    public function create(Request $request): View
    {
        $asistencia = new Asistencia();
        $idEventos = $request->input('id_eventos');

        return view('asistencia.create', compact('asistencia','idEventos'));
    }


    /**
     *almacena un nuevo recurso.
     */
    public function store(AsistenciaRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['id_eventos'] = $request->input('id_eventos');

        Asistencia::create($data);

        return Redirect::route('eventos.index')
        ->with('success', 'Asistencia Registrada Correctamente.');
    }

    /**
     * muestra los recursos especificos.
     */
    public function show($id): View
    {
        $asistencia = Asistencia::find($id);

        return view('asistencia.show', compact('asistencia'));
    }

    /**
     * editar el recurso especifico.
     */
    public function edit($id): View
    {
        $asistencia = Asistencia::find($id);

        return view('asistencia.edit', compact('asistencia'));
    }

    /**
     * actualizar el recurso.
     */
    public function update(AsistenciaRequest $request, Asistencia $asistencia): RedirectResponse
    {
        $asistencia->update($request->validated());

        return Redirect::route('asistencias.index')
            ->with('success', 'Asistencia Actualizada Correctamente');
    }

    public function destroy($id): RedirectResponse
    {
        Asistencia::find($id)->delete();

        return Redirect::route('asistencias.index')
            ->with('success', 'Asistencia Eliminada Correctamente');
    }
}
