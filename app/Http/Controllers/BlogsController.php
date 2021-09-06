<?php

namespace App\Http\Controllers;

use App\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{

    public function magazinemain()
    {
        return view('blogs.magazine.index');
    }

    public function getallblogs(Request $request)
    {
        
        $blogs = Blogs::where(['status_id' => $request->reference_status])->orderBy('blog_id', 'asc')->get();

        return response()->json([
            'data' => $blogs
        ]);
    }

}
