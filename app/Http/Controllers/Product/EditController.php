<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\AdminPanel;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke($id)
    {
        $table = new AdminPanel;
        $categories = Category::all();
        return view('edit',
            ['table' => $table->find($id)],
            ['categories' => $categories],
        );
    }
}
