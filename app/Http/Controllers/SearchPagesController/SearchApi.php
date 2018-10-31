<?php

namespace App\Http\Controllers\SearchPagesController;

use Illuminate\Http\Request;
use App\Model\Products;
use App\Http\Controllers\Controller;

class SearchApi extends Controller
{
    


    public function allproduct (){
        $products = Products::all();
        return json_encode($products);
    
        
}

public function show(Request $request, $id)
{
    $article = Products::findOrFail($id);
    $article->update($request->all());

    return $article;
}
}