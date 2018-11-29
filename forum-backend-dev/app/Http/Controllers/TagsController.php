<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
//  Метод вывода всех Тэгов.

    public function index()
    {
        return Tags::all();
    }

//  Метод вывода конкретнго Тэга.

    public function show(Tags $tag)
    {
        return $tag;
    }

//  Метод отправки содержимого форм в БД.

    public function store()
    {
        request()->validate(['name' => 'required']);

        return Tags::create(request(['name']));
    }

//  Метод сохранения изменений Тэга.

    public function update(Tags $tag)
    {
        $tag->update(request()->all());

        return response()->json($tag,200);
    }

//  Метод удаления Тэга.

    public function destroy($id) {

        Tags::findOrFail($id)->delete();

        return 204;
    }

}
