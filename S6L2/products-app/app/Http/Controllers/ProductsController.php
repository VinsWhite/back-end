<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{

    // In questo esercizio non usiamo il database !!!

    public $products = [
        ['id' => 1,'name'=> 'Tavolo', 'price'=> 300],
        ['id' => 2,'name'=> 'Sedia', 'price'=> 50],
        ['id' => 3,'name'=> 'Sedia da giardino', 'price'=> 40],
        ['id' => 4,'name'=> 'Divano', 'price'=> 400],
        ['id' => 5,'name'=> 'Lampada', 'price'=> 30],
        ['id' => 6,'name'=> 'Bottiglia di vetro', 'price'=> 2],
        ['id' => 7,'name'=> 'Libro placeholder', 'price'=> 1],
        ['id' => 8,'name'=> 'Scrivania', 'price'=> 100],
        ['id' => 9,'name'=> 'Armadio', 'price'=> 650],
    ];
    
    public function index()
    {
        return view('viewProducts', ['title' => 'Visualizza prodotti', 'products' => $this->products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createProduct', ['title' => 'Aggiungi prodotti', 'products' => $this->products]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('editProduct', ['title' => 'Modifica prodotti', 'products' => $this->products]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
