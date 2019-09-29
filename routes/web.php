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

//Route::get('/', 'CidadaoDeOlho\GastosDeputadosController@index');

Route::get('/teste', 'ALMG\AlmgController@teste');

Route::get('/', 'Home\HomeController@index');

//rotas genericas para diversos crawlers(outros estados)
Route::get('/crawler', 'Crawler\CrawlerController@index');
//crawler da ALMG
Route::get('/crawler/almg', 'Crawler\ALMGCrawlerController@index');
