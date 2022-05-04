<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\AdminPanel;
use App\Models\Category;

class ShowController extends BaseController
{
    public function __invoke()
    {

        // fragment - обавялет хэш, withQueryString() - ссылки для фильтрации
        $table = AdminPanel::orderBy('id', 'desc')->paginate(9)->fragment('users')->withQueryString();
        $categories = Category::all();
        // $ravno = new AdminPanelFactory;

        return view('show', [

            'table' => $table->withPath('/admin/users'),
          // Сортировка
          //  'table' => $table->appends(['sort' => 'votes']);,

          // Старое
          //  'table' => $table->orderBy('id', 'desc')->take(6)->get(),
            'table_name' => AdminPanel::exists(),
            'cat' => $categories
            //  ['ravno' => $ravno->where('category', '=', 'zspr')->get()]
        ]);
    }
}
