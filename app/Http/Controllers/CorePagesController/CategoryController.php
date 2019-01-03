<?php

namespace App\Http\Controllers\CorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\shop\Category;

class CategoryController extends BaseController
{
    public function Category(Category $Category)
    {
        
        $prod = $Category->products()->paginate(2);
        $category_shop = $Category::with('products')->get();

        $data = [
            'category' => $category_shop,
            'prod' => $prod
        ];

        return view('site.pages.categoryshop')->with($data);
    }
   
}
