<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
header( 'Access-Control-Allow-Headers', 'X-Requested-With, Authorization, Content-Type' );

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


//В фаиле api.php указываеются роуты именно для создание api приложения.
//полный адресс будет выглядить примерно так mysait.com/api/post или mysait.com/api/user 
//Посты
Route::get('/post/{id?}', 'TopicsController@getPost'); //Возвращает все посты или по id. знак ? означает необязательный параметр
Route::post('/post', 'TopicsController@addPost');  //Добавляет посты. Возвращает ?
Route::put('/post/{id}', 'TopicsController@editPost'); //Редактирование поста по id. Возвращает ?
Route::delete('/post/{id}', 'TopicsController@delPost'); //Удаление поста по id. Возвращает 1 или 0

//Комментарии
Route::get('/comment/{id?}', 'CommentController@getComment'); // Возвращает комментарии все или по id
Route::post('/comment', 'CommentController@addComment'); //Добавление комментари.
Route::put('/comment/{id}', 'CommentController@editComment'); //Редактирование комментария.
Route::delete('/comment/{id}', 'CommentController@delComment'); //Удаляет комментарий. Возвращает 1 или 0


//Юзвери
Route::get('/user/info/{id}', 'UserS@getUser'); // Возвращает данные о пользователе по id. 
Route::get('/user/auth', 'UserS@authUser'); //Авторизация пользователя. Возвращает 1 или 0, и ид пользователя (?)
Route::post('/user', 'UserS@addUser'); //регистрация юзера. Возвращает 1 или 0
Route::put('/user/{id}', 'UserS@editUser'); //Редактирование юзера по id. Возвращает 1 или 0
Route::delete('/user/{id}', 'UserS@delUser'); //Удаление юзера по id. Возвращает 1 или 0


//Правда я еще не понимаю как они на вю сделают работу с сессиями. ))