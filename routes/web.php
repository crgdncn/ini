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

/*
 * Define INI types, sections and keys
 */
Route::prefix('ini')->name('ini.')->group(function () {
    Route::resources([
        'types' => 'Ini\TypeController',
        'sections' => 'Ini\SectionController',
        'keys' => 'Ini\KeyController',
    ]);
});
