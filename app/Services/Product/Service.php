<?php

namespace App\Services\Product;


use App\Http\Controllers\AdminPanelController;
use App\Http\Requests\Product\AdminRequests;
use Illuminate\Support\Facades\Storage;

class Service
{

    public function reg(AdminRequests $row, $id)
    {
        if ($row->hasFile('profile_image')) {
            $img = Storage::put('/images', $row->file('profile_image'));
        } else {
            $img = 'storage/Белый_квадрат.jpg';
        }

        $row->merge(['profile_image' => $img]);
    }

    public function update()
    {

    }
}
