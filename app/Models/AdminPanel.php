<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminPanel extends Model
{
    use HasFactory;

//    "Мягкое удаление"
    use SoftDeletes;

    protected $table = 'admin_panels';
    protected $guarded = []; // Разрешает вносить значения в БД

// Категории. Достаем значения по id (категории) .. hasMany - определяет отношение одного объекта с другим .. admin_panel_id - имя бд
    public function categories() {

        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

// Тэги
    public function tags() {
        return $this->belongsToMany( Tag::class, 'admin_panel_tags', 'post_id', 'tag_id');
    }


}
