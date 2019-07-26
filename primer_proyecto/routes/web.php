<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/miPrimeraRuta', function(){
  return 'Creé mi primera ruta en Laravel';
});

Route::get('/esPar/{numero}', function($numero){
  if ($numero%2 == 0) {
    return "$numero es par.";
  }
  return "$numero es impar.";
});

Route::get('/sumar/{num1}/{num2}/{num3?}', function($num1, $num2, $num3 = 0){
  $sum = $num1+$num2+$num3;
  return "$num1 + $num2 + $num3 = $sum";
});

Route::get('/peliculas', function(){
  $peliculas = [
    1 => [
      'title' => 'Cenicienta',
      'rating' => 5.7
    ],
    2 => [
      'title' => 'La Sirenita',
      'rating' => 6.0
    ],
    3 => [
      'title' => 'Enredados',
      'rating' => 8.8
    ],
    4 => [
      'title' => 'Frozen',
      'rating' => 7.1
    ],
    5 => [
      'title' => 'Mulan',
      'rating' => 9.2
    ]
  ];
  // $peliculas = [];
return view('peliculas', compact('peliculas'));
});

Route::get('/detallePelicula/{id}', function ($id) {
  $peliculas = [
    1 => [
      'title' => 'Cenicienta',
      'rating' => 5.7
    ],
    2 => [
      'title' => 'La Sirenita',
      'rating' => 6.0
    ],
    3 => [
      'title' => 'Enredados',
      'rating' => 8.8
    ],
    4 => [
      'title' => 'Frozen',
      'rating' => 7.1
    ],
    5 => [
      'title' => 'Mulan',
      'rating' => 9.2
    ]
  ];
    return view('detallePelicula', compact('peliculas', 'id'));
});

Route::get('/app', function () {
    return view('layout.app');
});
