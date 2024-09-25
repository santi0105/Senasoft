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
        $eventos = Evento::paginate();
        $busqueda= $request->busqueda;
        $centro = Centro::where('regional','LIKE','%'.$busqueda.'%')
        ->orWhere('nombre','LIKE','%'.$busqueda.'%')
        ->latest('id')
        ->paginate(2);
        
        $data=[
            'centros'=>$centro,
            'busqueda'=>$busqueda,
        ];
        return view('evento.index',$data,compact('eventos','centro'))
            ->with('i');
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
            ->with('success', 'Evento updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Evento::find($id)->delete();

        return Redirect::route('eventos.index')
            ->with('success', 'Evento deleted successfully');
    }
}
