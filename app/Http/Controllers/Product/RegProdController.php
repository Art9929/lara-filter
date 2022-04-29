<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AdminRequests;
use App\Models\AdminPanel;
use Illuminate\Support\Facades\Storage;

class RegProdController extends BaseController
{
    public function __invoke(AdminRequests $row)
    {
        // Validate уже внутри функции
        $id = '';
        $this->service->reg($row, $id);

        // model
        $table = $row->input();
        AdminPanel::create($table);

        // return
        return redirect('show');
    }
}
