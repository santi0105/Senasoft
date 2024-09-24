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
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $centros = Centro::paginate();

        return view('centro.index', compact('centros'))
            ->with('i', ($request->input('page', 1) - 1) * $centros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $centro = new Centro();

        return view('centro.create', compact('centro'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CentroRequest $request): RedirectResponse
    {
        Centro::create($request->validated());

        return Redirect::route('centros.index')
            ->with('success', 'Centro created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $centro = Centro::find($id);

        return view('centro.show', compact('centro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $centro = Centro::find($id);

        return view('centro.edit', compact('centro'));
    }

    /**
     * Update the specified resource in storage.
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
