<?php

// Rutas welcome.
Route::get('/','PagesController@inicio');
Route::get('/detalle/{id}', 'PagesController@detalle')->name('notas.detalle');
Route::post('/', 'PagesController@crear')->name('notas.crear');
Route::get('/editar/{id}', 'PagesController@editar')->name('notas.editar');
Route::put('/editar/{id}', 'PagesController@actualizar')->name('notas.actualizar');
Route::delete('/eliminar/{id}', 'PagesController@eliminar')->name('notas.eliminar');

// Rutas fotos.
Route::get('/fotos','PagesController@fotos')->name('foto');

// Rutas blog.
Route::get('/blog', 'PagesController@blog')->name('noticias');

// Rutas nosotros.
Route::get('/nosotros/{nombre?}', 'PagesController@nosotros')->name('nosotros');

