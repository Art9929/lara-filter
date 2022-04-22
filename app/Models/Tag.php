<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Тэги Многие ко многим
    public function products() {

        return $this->belongsToMany(AdminPanel::class, 'admin_panel_tags', 'tag_id', 'post_id');
    }
}
