<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Добавляем из папки Models класс Post, исп use
use App\Models\AdminPanel;
use App\Models\Category;
use App\Models\Tag;

// Добавялем обработчик ошибкок
use App\Http\Requests\AdminRequests;
use Illuminate\Support\Facades\Storage;

class AdminPanelController extends Controller  {

//  Витрина
    public function show()  {
        $table = new AdminPanel;
        $categories = Category::all();
        // $ravno = new AdminPanel;

        return view('show', [

             'table' => $table->orderBy('id', 'desc')->take(6)->get(),
             'table_name' => AdminPanel::exists(),
             'cat' => $categories
              //  ['ravno' => $ravno->where('category', '=', 'zspr')->get()]
        ]);
    }

    // Страница Создать товар
    public function add() {

        $categories = Category::all();

        return view('product', ['categories' => $categories]);
    }

    // Регитсрация продукта
    public function regprod(AdminRequests $row) {
        if ($row->hasFile('profile_image')) {
            $img = Storage::put('/images', $row->file('profile_image'));
        } else {
            $img = 'storage/Белый_квадрат.jpg';
        }

        $row->merge(['profile_image' => $img]);
        $table = $row->input();

        AdminPanel::create($table);

        return redirect('show');
    }


//  Показать карточку одного товара
    public function OneShowProduct($id) {

        $table = new AdminPanel;

        return view('one_product',
            ['table' => $table->find($id)],
//            ['categories' => $categories->find($id)],
//            ['tagcolor' => $tagcolor->find($id)],
        );
    }
    // Страница редактирования карточки товара
    public function edit($id) {

        $table = new AdminPanel;
        $categories = Category::all();
        return view('edit',
            ['table' => $table->find($id)],
            ['categories' => $categories],
        );
    }

    // Отредактированная карточка товаров
    public function EditProduct($id, AdminRequests $row) {

        if ($row->hasFile('profile_image')) {
            $img = Storage::put('/images', $row->file('profile_image'));
        } else {
            $img = 'storage/Белый_квадрат.jpg';
        }

        $row->merge(['profile_image' => $img]);
        $tables = $row->input();

        AdminPanel::find($id)->update($tables);
        $table = new AdminPanel;
        $categories = new Category;

        return view('one_product',
            ['table' => $table->find($id)],
            ['categories' => $categories->find($id)],
    )->with('success', "Все обнолвено!");
   }


//  Удалить продукт
    public function DeleteProduct($id) {
        AdminPanel::find($id)->delete();
        return redirect()->route('show');

        /*  "Мягкое" удаление (восстановление)
                AdminPanel::withTrashed()->find(1)->restore();
                */
    }

// Категории (таблица - category, admin_panel)
    public function categories ($category_id) {

        $table = new AdminPanel;
        $categories = new Category;

        return view('categories',
            ['table' => $table->find($category_id)],
            ['categories' => $categories->find($category_id)],
    );
   }

// Тэги Цвет (таблица - tags, admin_panel_tegs, admin_panel)
    public function TagColor ($id) {

        $table = Tag::find($id);
dd($table);
//        return view('categories', ['categories' => $categories]);
    }





    public function JsonCodeProduct() {
        header('Content-Type: application/json');
        $json_code = AdminPanel::all();

        echo json_encode($json_code, JSON_UNESCAPED_UNICODE);

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
    }
}
