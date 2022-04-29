<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AdminRequests;
use App\Models\AdminPanel;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class EditProductController extends BaseController
{
    public function __invoke(AdminRequests $row, $id)
    {
        // Validate уже внутри функции
        $this->service->reg($row, $id);

        // update product
        $table = $row->input();
        AdminPanel::find($id)->update($table);

        // model
        $table = new AdminPanel;
        $categories = new Category;

        // return
        return view('one_product',
            ['table' => $table->find($id)],
            ['categories' => $categories->find($id)],
        )->with('success', "Все обнолвено!");
    }
}
