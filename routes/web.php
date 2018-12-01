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

Route::get('/', "HomeController@index")->name('home');

/*
 * Define INI types, sections and keys
 */
Route::prefix('ini')->name('ini.')->group(function () {

    Route::get('/sections/all', "Ini\SectionController@all")->name('sections.all');
    Route::get('/keys/all', "Ini\KeyController@all")->name('keys.all');

    Route::resources([
        'types' => 'Ini\TypeController',
        'types.sections' => 'Ini\SectionController',
        'types.sections.keys' => 'Ini\KeyController',
    ]);
});
