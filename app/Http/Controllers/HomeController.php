<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        $data = DB::table('posts')->paginate(10);
        $categorys = DB::table('categorys')->get();
        $seos = DB::table('seos')->get();
        return view('index', ['data' => $data, 'categorys' => $categorys, 'seos' => $seos]);
    }
    public function details(Request $request)
    {
        $data = DB::table('posts')->where('id', $request->id)->first();
        $category = DB::table('categorys')->where('id', $data->post_catergory)->first();
        $categorys = DB::table('categorys')->get();
        $seos = DB::table('seos')->get();

        $created_date = thaidate('l j F Y', $data->created_date);
        return view('details', ['data' => $data, 'categorys' => $categorys, 'category' => $category, 'created_date' => $created_date, 'seos' => $seos, 'posts' => $data]);
    }
    public function category(Request $request)
    {
        Paginator::useBootstrap();
        $seos = DB::table('seos')->get();
        $post = DB::table('posts')->where('post_catergory', $request->id)->paginate(10);
        $categorys = DB::table('categorys')->get();
        return view('category', ['data' => $post, 'categorys' => $categorys, 'category_id' => $request->id, 'seos' => $seos]);
    }
}
