<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;

class AddController extends BaseController
{
    public function __invoke() {

        $categories = Category::all();

        return view('product', ['categories' => $categories]);

    }
}
