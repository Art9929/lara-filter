<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\AdminPanel;
use App\Models\Category;

class CategoriesController extends BaseController
{
    public function __invoke($category_id)
    {
        $table = new AdminPanel;
        $categories = new Category;

        return view('categories',
            ['table' => $table->find($category_id)],
            ['categories' => $categories->find($category_id)],
        );
    }
}
