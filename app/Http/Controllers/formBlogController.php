<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class formBlogController extends Controller
{
    public function input($id)
    {
        $blog=Blog::find($id);
        return view('blog-form',[
            'blog'=>$blog
        ]);
    }

    public function updateIsi(request $request, $id)
    {
        $blog=Blog::find($id);
        $blog->text=$request->text;
        $blog->save();

        return redirect()->route('blog');
    }
}
