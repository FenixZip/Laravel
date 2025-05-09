<?php

namespace App\Admin\Widgets;

use App\Models\Product;
use TCG\Voyager\Widgets\BaseDimmer;

class ProductsWidget extends BaseDimmer
{
    protected $config = [];

    public function run()
    {
        $count = Product::count();
        $string = 'Продуктов';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-basket',
            'title'  => "{$count} {$string}",
            'text'   => "Общее количество продуктов: {$count}",
            'button' => [
                'text' => 'Просмотреть продукты',
                'link' => route('voyager.products.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }
}
