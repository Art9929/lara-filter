<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagColorController extends BaseController
{
    public function __invoke($id)
    {
        $table = Tag::find($id);
        dd($table);
//        return view('categories', ['categories' => $categories]);

    }
}
