<?php

use Illuminate\Support\Facades\Route;
Route::get('/', [\App\Http\Controllers\HomeController::class,"home"])
->name('home');

Route::get('/acerca-de', [\App\Http\Controllers\HomeController::class,"about"])
->name('about');

Route::get('/blogs', [\App\Http\Controllers\BlogController::class,"index"])
->name('blogs');

Route::get('/usuarios', [\App\Http\Controllers\UserController::class,"index"])
->name('users')
->middleware('auth');

Route::post('/usuario/editar-nombre', [\App\Http\Controllers\UserController::class,"editProcessName"])
->name('user.edit.name.process')
->middleware('auth');


Route::get('/usuario/editar-nombre', [\App\Http\Controllers\UserController::class,"editNameForm"])
->name('user.edit.form.name')
->middleware('auth');

Route::get('/usuario/editar-email', [\App\Http\Controllers\UserController::class,"editForm"])
->name('user.edit.form')
->middleware('auth');

Route::post('/usuario/editar-email', [\App\Http\Controllers\UserController::class,"editProcessEmail"])
->name('user.edit.process')
->middleware('auth');


Route::get('juegos/disponibles', [\App\Http\Controllers\GamesController::class,"index"])
->name('games');

Route::get('juegos/{id}', [\App\Http\Controllers\GamesController::class,"view"])
->name('games.view')
->middleware('age-over-18')
->whereNumber('id');

Route::get('juegos/{id}/confirmar-edad', [\App\Http\Controllers\AgeVerificationController::class,"verificationForm"])
->name('games.age-verification.form');

Route::post('juegos/{id}/confirmar-edad', [\App\Http\Controllers\AgeVerificationController::class,"verificationProcess"])
->name('games.age-verification.process');


//Usamos el middleware auth todas las rutas q deseamos proteger

Route::get('juegos/crear', [\App\Http\Controllers\GamesController::class,"createForm"])
->name('games.create.form')
->middleware('auth');

Route::get('juegos/{id}/editar', [\App\Http\Controllers\GamesController::class,"editForm"])
->name('games.edit.form')
->whereNumber('id')
->middleware('auth');

Route::put('juegos/{id}/editar', [\App\Http\Controllers\GamesController::class,"editProcess"])
->name('games.edit.process')
->whereNumber('id')
->middleware('auth');

Route::delete('juegos/{id}/eliminar', [\App\Http\Controllers\GamesController::class,"deleteProcess"])
->name('games.delete.process')
->whereNumber('id')
->middleware('auth');

Route::post('juegos/crear', [\App\Http\Controllers\GamesController::class,"createProcess"])
->name('games.create.process')
->middleware('auth');
Route::get('/mi-perfil', [\App\Http\Controllers\UserController::class,"profile"])
->name('profile')
->middleware('auth');

//Ruta de autenticación
Route::get('/iniciar-sesion', [\App\Http\Controllers\AuthController::class,"loginForm"])
->name('login');


Route::post('/iniciar-sesion', [\App\Http\Controllers\AuthController::class,"loginProcess"])
->name('auth.login.process');

Route::post('/cerrar-sesion', [\App\Http\Controllers\AuthController::class,"logoutProcess"])
->name('auth.logout.process')
->middleware('auth');

// Ruta para envio de mails

Route::post('/juegos/{id}/reservar', [\App\Http\Controllers\GamesReservationController::class,"resevationProcess"])
->name('games.reservation.process')
->middleware('auth');

Route::get('/test/emails/reservar-juego', [\App\Http\Controllers\GamesReservationController::class,"printEmail"])
->name('games.reservation.test')
->middleware('auth');

//Rutas de carrito
Route::post('/juego/{id}/agregar-a-carrito', [\App\Http\Controllers\PurchaseController::class,"addCart"])
->name('games.add.cart')
->middleware('auth');

Route::post('/juego/{id}/restar-a-carrito', [\App\Http\Controllers\PurchaseController::class,"removeFromCart"])
->name('games.remove.from.cart')
->middleware('auth');

Route::get('/carrito', [\App\Http\Controllers\PurchaseController::class,"viewCart"])
->name('cart.index')
->middleware('auth');
;

//Rutas de mercadopago

Route::get('test/mercadopago', [\App\Http\Controllers\MercadoPagoController::class, 'show'])
->name('test.mercadopago.show');
Route::get('test/mercadopago/v2', [\App\Http\Controllers\MercadoPagoController::class, 'showV2'])
->name('test.mercadopago.show.v2');
Route::get('test/mercadopago/success', [\App\Http\Controllers\MercadoPagoController::class, 'successProcess'])
->name('test.mercadopago.successProcess');
Route::get('test/mercadopago/pending', [\App\Http\Controllers\MercadoPagoController::class, 'pendingProcess'])
->name('test.mercadopago.pendingProcess');
Route::get('test/mercadopago/failure', [\App\Http\Controllers\MercadoPagoController::class, 'failureProcess'])
->name('test.mercadopago.failureProcess');

