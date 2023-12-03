<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Add this import statement
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function Post()
    {
        Paginator::useBootstrap();
        $post = DB::table('posts')->paginate(10);
        $categorys = DB::table('categorys')->get();
        return view('admin/post', ['post' => $post, 'categorys' => $categorys]);
    }
    public function NewPost(Request $request)
    {
        $process = request('process');
        $post_id = request('post_id');
        $categorys = DB::table('categorys')->get();
        $data = [
            "post_id" => "",
            "post_name" => "",
            "post_description" => "",
            "post_catergory" => "",
            "post_image" => "",
            "post_status" => ""
        ];

        if ($process != "add") {
            $data = DB::table('posts')->where('id', $post_id)->first();
        }

        return view('admin/form_post', ['data' => $data, 'categorys' => $categorys, 'process' => $process]);
    }
    public function ProcessNewPost(Request $request)
    {
        if ($request->process == 'add') {
            $post = new Post();
            $post->post_name = $request->post_name;
            $post->post_description = $request->post_description;
            $post->post_catergory = $request->post_catergory;
            $post->post_status = '1';
            $post->post_image = 'test.png';
            $post->save();
        } 
        elseif ($request->process == 'edit') {
            $post = Post::find($request->post_id);
            $post->post_name = $request->post_name;
            $post->post_description = $request->post_description;
            $post->post_catergory = $request->post_catergory;
            $post->post_status = $request->post_status;
            // $post->post_image = 'test.png';
            $post->save();
        }
        elseif ($request->process == 'delete') {
            $post = Post::find($request->post_id);
            $post->post_status = '0';
            $post->save();
        }
        return redirect('/admin/post');
    }
}
