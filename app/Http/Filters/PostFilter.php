<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const PRICE = 'price';
    public const CATEGORY_ID = 'category_id';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::PRICE => [$this, 'price'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function price(Builder $builder, $value)
    {
        $builder->where('price', 'like', "%{$value}%");
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }
}
