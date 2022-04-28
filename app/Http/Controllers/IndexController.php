<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }
}


/*
    return response()->json([
        'success' => true,
        'message' => 'Successfully loaded auto!',
        'models' => $auto,
    ], 201);
    */


/*
         *
         *      0. Второй Вариант сохранения данных в БД
                $table = new AdminPanel();

                $add = [
                    $table->product = $row->input('product'),
                    $table->category = $row->input('category'),
                    $table->name = $row->input('name'),
                    $table->price = $row->input('price'),
                    $table->weight = $row->input('weght'),
                    $table->description = $row->input('description'),
                    $table->profile_image = $img,
                ];

                dd($add);
                $table->save($add);

                1. Проверка на совпадение переменной в БД

                $user->roles()->firstOrCreate([
                    'name' => 'Administrator',
                ], [
                    'created_by' => $user->id,
                ]);


                2. Обращние к категориям
                $test = Category::find(1);

                $products = AdminPanel::where('category_id', $test->id)->get();
                dd($test->products);

                */
