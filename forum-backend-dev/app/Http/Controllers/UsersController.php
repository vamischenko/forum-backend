<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
//  Метод вывода всех Пользователей.

    public function index()
    {
        return Users::all();
    }

//  Метод вывода конкретного Пользователя.

    public function show(Users $user)
    {
        return $user;
    }

//  Метод отправки содержимого форм в БД.

    public function store(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'user_email' => 'required',
            'password' => 'required',
        ]);

       return Users::create(request(['username', 'user_email', 'password']));
    }

//  Метод сохранения изменений Пользователей.

    public function update(Users $user) {

        $user->update(request()->all());

        return response()->json($user,200);
    }

//  Метод удаления Пользователя.

    public function destroy($id) {

        Users::findOrFail($id)->delete();

        return 204;
    }
}
