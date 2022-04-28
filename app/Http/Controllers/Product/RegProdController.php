<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequests;
use App\Models\AdminPanel;
use Illuminate\Support\Facades\Storage;

class RegProdController extends Controller
{
    public function __invoke(AdminRequests $row)
    {
        if ($row->hasFile('profile_image')) {
            $img = Storage::put('/images', $row->file('profile_image'));
        } else {
            $img = 'storage/Белый_квадрат.jpg';
        }

        $row->merge(['profile_image' => $img]);
        $table = $row->input();

        AdminPanel::create($table);

        return redirect('show');
    }
}
