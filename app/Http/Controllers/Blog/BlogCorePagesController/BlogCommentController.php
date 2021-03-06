<?php

namespace App\Http\Controllers\Blog\BlogCorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\BlogsCommentsRequest;
use App\Model\Blogs\Blog_Comment as Commments;

class BlogCommentController extends BaseController
{
    public function addcomments ( BlogsCommentsRequest $request  )
    {
        
        $validated = $request->validated();

        $allcomments = Commments::create([
        'name' => $request->input('name'),
        'body' => $request->input('body'),
        'blog_id' => $request->input('article_id'),
        'visable' => 0,
        ]);

        session()->flash('goods', 'Ваш комментарий добавлен на обработку');

        return back()->withInput();
       
    }
}
