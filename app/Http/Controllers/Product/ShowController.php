<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\AdminPanel;
use App\Models\Category;

class ShowController extends BaseController
{
    public function __invoke()
    {

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
}
