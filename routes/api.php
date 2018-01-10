<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function()
{
  Route::get('/redirect', function () {
      $query = http_build_query([
          'client_id' => 'client-id',
          'redirect_uri' => 'http://example.com/callback',
          'response_type' => 'code',
          'scope' => '',
      ]);

      return redirect('http://your-app.com/oauth/authorize?'.$query);
  });

  Route::get('casas_duenos/{id}', 'casasController@showHousesForIdPerson');

  Route::get('person', 'PersonController@index');
  Route::get('person/{id}', 'PersonController@show');
  Route::post('person', 'PersonController@store');

  Route::get('/home', 'HomeController@index')->name('home');


});


Route::get('/login','ApiController@accessToken');



Route::middleware('auth:api')->get('/user', function (Request $request) {

   return $request->user();

});

Route::get('/login','ApiController@accessToken');


Route::get('/mostrarTexto','PersonController@index');
