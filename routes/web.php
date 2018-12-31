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
    Route::resources([
        'types' => 'Ini\TypeController',
        'types.sections' => 'Ini\SectionController',
        'types.sections.keys' => 'Ini\KeyController',
    ]);
});

/*
 * Create INI files
 */
Route::prefix('files')->name('files.')->group(function () {
    Route::resources([
        'file' => 'Files\FileController',
        'file.sections' => 'Files\SectionController',
        'file.sections.keys' => 'Files\KeyController',
    ]);

    Route::get('/file/{file}/download', 'Files\FileController@download')->name('file.download');
});
