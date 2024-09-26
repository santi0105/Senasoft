<?php

namespace App\Http\Controllers;

use App\Models\Alquilere;
use App\Models\User;
use App\Models\Bicicleta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AlquilereRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AlquilereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $alquileres = Alquilere::paginate();

        return view('alquilere.index', compact('alquileres'))
            ->with('i', ($request->input('page', 1) - 1) * $alquileres->perPage());
    }

    /**
     *crea un nuevo recurso
     */
    public function create(Request $request): View
    {
        $alquilere = new Alquilere();     
       $idBicicletas = $request->input('id_bicicletas');
        $users= User::all();
        return view('alquilere.create',compact('alquilere','users','idBicicletas'));
    }


    /**
     * Almacene un recurso recién creado en el almacenamiento.
     */
    public function store(AlquilereRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['id_bicicletas'] = $request->input('id_bicicletas');
    
        // Crear el alquiler{{  }}
        $alquilere = Alquilere::create($data);
    
        // Buscar la bicicleta y actualizar su estado
        $bicicleta = Bicicleta::find($data['id_bicicletas']);
        if ($bicicleta && $bicicleta->estado === 'Activa') {
            $bicicleta->update(['estado' => 'Inactiva']);{{  }}
        }
    
        return Redirect::route('bicicletas.index')
            ->with('success', 'Alquiler Realizado Exitosamente.');
    }



    /**
     * muestre los recursos
     */ 

   

    public function show($id): View
    {
        $alquileres = Alquilere::all(); //se crea una instancia con el modelo y traemos todos los datos con el metodo all()
        $alquilere = Alquilere::find($id); // nuevamente llamamos el modelo y nos traemos el id
        return view('alquilere.show', compact('alquilere','alquileres')); //redirigimos a la vista correspondiente con las variables instanciadas en el compact
    }

    /**
    
     *  editar el recurso especifico
     */
    public function edit(Request $request, $id): View
    {
        $alquilere = Alquilere::find($id);
        $idBicicletas = $request->input('id_bicicletas');

        return view('alquilere.edit', compact('alquilere','idBicicletas'));
    }

    /**
    
     * Actualizamos el recurso en el paquete
     */
    public function update(AlquilereRequest $request, Alquilere $alquilere): RedirectResponse
    {
        $alquilere->update($request->validated());
        

        return Redirect::route('alquileres.index')
            ->with('success', 'Alquilere updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Alquilere::find($id)->delete();

        return Redirect::route('alquileres.index')
            ->with('success', 'Alquilere deleted successfully');
    }
}
