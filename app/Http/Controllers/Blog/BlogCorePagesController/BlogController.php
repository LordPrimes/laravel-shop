<?php

namespace App\Http\Controllers\Blog\BlogCorePagesController;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator ;
use App\Http\Controllers\Controller;
use App\Model\Blogs\Blog;
use App\Model\Blogs\Blog_Category;
use Carbon\Carbon;
use App\Model\Seo;
use Session;

class BlogController extends Controller
{
    public function index(Request $request){
        $blog = Blog::OrderDesc()->paginate(1);
            $date = Carbon::now()->subDays(7);
            $lastarticle = Blog::LastArticle($date)->get();
            $popularblog = Blog::StatusPopular()->get();
            $recommendblog = Blog::StatusRecommend()->get();

            if ($request->session()->exists('viewed')) {
                $products = session()->get('viewed');
                $youviewed = Blog::Viewed($products)->get();
              
            }
            else {
                $youviewed = null;
            }
            $category = Blog_Category::all();
            $pagesname = $request->route()->getName();
            $seo = Seo::SeoPages($pagesname)->get();
            
                        $data = ['blog' => $blog, 
                        'category' => $category, 
                        'lastarticle' => $lastarticle, 
                        'popularblog' =>$popularblog, 
                        'recommendblog' => $recommendblog, 
                        'youviewed' => $youviewed,
                        'seo' => $seo 
                       
                                      
           ];
           return view('site.pages.blog')->with($data);
                     
    }

}