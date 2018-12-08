<?php
namespace App\Http\Controllers\BlogPagesController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Model\blog;
use App\Model\Blog_Recommend as Recommend;
use App\Model\Blog_Comment as Comment;
use Session;
use DB;


class BlogsViewController extends Controller
{
    public function show (Request $request, $seo_url  ){

        session()->push('viewed', $seo_url); 
       
        $blog = blog::SeoTitle($seo_url)
                        ->firstorFail();
        $recommend = Recommend::Recommend($seo_url)->get();
        
        $data = [
                'blog' => $blog, 
                'recommend' => $recommend      
                ];
        return view('site.pages.viewblog')->with($data);
    }

    public function showcomment(Request $request)
    {
       if($request->get('commend'))
     {
        $id = $request->get('commend');
        $result = Comment::ViewBlogComment($id)->get();
        return $result;
       
    }

}
}