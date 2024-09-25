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
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $alquilere = new Alquilere();     
       $idBicicletas = $request->input('id_bicicletas');
        $users= User::all();
        return view('alquilere.create',compact('alquilere','users','idBicicletas'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AlquilereRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['id_bicicletas'] = $request->input('id_bicicletas');

        Alquilere::create($data);
        
        return Redirect::route('alquileres.index')
            ->with('success', 'Alquilere created successfully.');
    }



    /**
     * Display the specified resource.
     */ 

   

    public function show($id): View
    {
        $alquileres = Alquilere::all();
        $alquilere = Alquilere::find($id);
        return view('alquilere.show', compact('alquilere','alquileres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $alquilere = Alquilere::find($id);

        return view('alquilere.edit', compact('alquilere'));
    }

    /**
     * Update the specified resource in storage.
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
