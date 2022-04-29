<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\AdminPanel;

class OneShowProductController extends BaseController
{
    public function __invoke($id)
    {
        $table = new AdminPanel;

        return view('one_product',
            ['table' => $table->find($id)],
//            ['categories' => $categories->find($id)],
//            ['tagcolor' => $tagcolor->find($id)],
        );
    }
}
