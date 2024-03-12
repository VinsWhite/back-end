<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queryBuilder = DB::table('libros')
                        ->join('autores', 'libros.autore_id', '=', 'autores.id');
        return view("visualizzaLibri", ['libros' => $queryBuilder->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aggiungiLibri', ['libros' => Libro::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        return view('aggiornaLibri');
    }

    
    public function libroDestroy(int $id) {

        $queryBuilder = DB::table('libros')->delete($id);
        return redirect()->back();
    }

    public function destroy(Libro $libro)
    {
        $queryBuilder = $libro->delete();
        return $queryBuilder ? 'Post Deleted' : 'Post not found!!!';
    }
}
