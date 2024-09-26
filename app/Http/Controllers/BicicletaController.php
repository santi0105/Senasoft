<?php

namespace App\Http\Controllers;

use App\Models\Bicicleta;
use App\Models\Centro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BicicletaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BicicletaController extends Controller
{
    /**
     * mostrar una lista del recurso
     */
    public function index(Request $request): View
    {
        $bicicletas = Bicicleta::paginate();

        return view('bicicleta.index', compact('bicicletas'))
            ->with('i', ($request->input('page', 1) - 1) * $bicicletas->perPage());
    }

    /**
     * crea un nuevo recurso.
     */
    public function create(): View
    {
        $bicicleta = new Bicicleta();
        $centros = Centro::all();

        return view('bicicleta.create', compact('bicicleta','centros'));
    }

    /**
     * almacena un nuevo recurso.
     */
    public function store(BicicletaRequest $request): RedirectResponse
    {
        $bicicleta = new Bicicleta();
        $bicicleta->marca = $request->marca;
        $bicicleta->color = $request->color;
        $bicicleta->estado = 'Activa';
        $bicicleta->precioHora = $request->precioHora;
        $bicicleta->id_centros = $request->id_centros;
        
        if($request->hasFile('img')){
            $path = $request->file('img')->store('fotos','public');
            $bicicleta->img = $path;
        }
        $bicicleta->save();

        return redirect()->route('bicicletas.index')->with('success','Bicicleta añadida correctamente.');

    }

    /**
     * muestra los recursos especificos.
     */
    public function show($id): View
    {
        // Cargar la bicicleta y el centro asociado
        $bicicleta = Bicicleta::with('centro')->find($id);
        
        if (!$bicicleta) {
            abort(404, 'Bicicleta no encontrada');
        }
    
        return view('bicicleta.show', compact('bicicleta'));
    }

    /**
     *editar el recurso especifico.
     */
    public function edit($id): View
    {
        $bicicleta = Bicicleta::find($id);

        return view('bicicleta.edit', compact('bicicleta'));
    }

    /**
     *actualizar el recurso.
     */
    public function update(BicicletaRequest $request, Bicicleta $bicicleta): RedirectResponse
    {
        $bicicleta->update($request->validated());

        return Redirect::route('bicicletas.index')
            ->with('success', 'Bicicleta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Bicicleta::find($id)->delete();

        return Redirect::route('bicicletas.index')
            ->with('success', 'Bicicleta deleted successfully');
    }
}
