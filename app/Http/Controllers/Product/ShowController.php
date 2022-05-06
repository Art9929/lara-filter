<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Models\AdminPanel;
use App\Models\Category;

class ShowController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $validated = $request->validated();
        /* Фильтр 1. Если существует любой запрос
        $table = AdminPanel::orderBy('id', 'desc')->paginate(100)->fragment('users')->withQueryString();
           if ($request->has('name')) {
           $table->where('weight', '=',  12);
        }
        */

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($validated)]);
        // fragment - обавялет хэш, withQueryString() - ссылки для фильтрации | withQueryString - сохраняет ссылки в пагинцаии
        $table = AdminPanel::filter($filter)->orderBy('id', 'desc')->paginate(2)->fragment('users')->withQueryString();

        $categories = Category::all();
        // $ravno = new AdminPanel;

        return view('show', [

            'table' => $table,
          // 'table' => $table->withPath('/admin/users'),
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
