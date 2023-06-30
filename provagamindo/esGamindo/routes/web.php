
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiocatoriController;
use App\Http\Controllers\PartiteController;

$router->get('/giocatore', 'GiocatoriController@index');
$router->get('/giocatore/{id}', 'GiocatoriController@show');
$router->post('/giocatore', 'GiocatoriController@create');
$router->put('/giocatore/{id}', 'GiocatoriController@update');
$router->delete('/giocatore/{id}', 'GiocatoriController@delete');

$router->get('/partite', 'PartiteController@index');
$router->get('/partite/{id}', 'PartiteController@show');
$router->post('/partite', 'PartiteController@create');
$router->put('/partite/{id}', 'PartiteController@update');
$router->delete('/partite/{id}', 'PartiteController@delete');
