<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Centro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EventoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Obtener la búsqueda desde el request
        $busqueda = $request->input('busqueda', '');
    
        // Aplicar filtro si existe la búsqueda
        if ($busqueda) {
            $eventos = Evento::where('lugar', 'LIKE', '%' . $busqueda . '%')
                ->latest('id')
                ->paginate(10); // Ajusta el número de eventos por página según tus necesidades
        } else {
            // Si no hay búsqueda, mostrar todos los eventos con paginación
            $eventos = Evento::latest('id')->paginate(10);
        }
    
        // Pasar datos a la vista
        return view('evento.index', [
            'eventos' => $eventos,
            'busqueda' => $busqueda,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $evento = new Evento();

        return view('evento.create', compact('evento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoRequest $request): RedirectResponse
    {
        $evento = new Evento();
        $evento->nombreEvento = $request->nombreEvento;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->lugar = $request->lugar;
        $evento->id_users = $request->id_users;

        if($request->hasFile('img')){
            $path = $request->file('img')->store('fotos','public');
            $evento->img = $path;
        }

        $evento->save();

        return redirect()->route('eventos.index')->with('success','Evento creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $evento = Evento::find($id);

        return view('evento.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $evento = Evento::find($id);

        return view('evento.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoRequest $request, Evento $evento): RedirectResponse
    {
        $evento->update($request->validated());

        return Redirect::route('eventos.index')
            ->with('success', 'Evento Actualizado Correctamente');
    }

    public function destroy($id): RedirectResponse
    {
        Evento::find($id)->delete();

        return Redirect::route('eventos.index')
            ->with('success', 'Evento Eliminado Correctamente');
    }
}
