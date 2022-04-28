<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequests;
use App\Models\AdminPanel;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class EditProductController extends Controller
{
    public function __invoke(AdminRequests $row, $id)
    {
        dd($row);
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
}
