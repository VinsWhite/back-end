<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Http\Requests\StoreLibroRequest;
use App\Http\Requests\UpdateLibroRequest;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('visualizzaLibri');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLibroRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        if($libro->user_id != Auth::user()->id) {
            abort(401);
        }
        return $libro;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibroRequest $request, Libro $libro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        //
    }
}
