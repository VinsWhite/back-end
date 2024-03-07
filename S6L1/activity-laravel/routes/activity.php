<?php 
use Illuminate\Support\Facades\Route;

Route::get('/view-activity', function () {
    return view('viewActivity');
});

Route::get('/create-activity', function () {
    return view('createActivity');
});

// in questa rotta è prevista sia la modifica che l'eliminazione
Route::get('/update-activity', function () {
    return view('updateActivity');
});

Route::get('/detail-activity/{name}', function (string $name) {
    $u = new stdClass();
    $u->name = $name;
    return view('detailActivity', ['obj' => $u]);
}) -> whereAlpha('name');