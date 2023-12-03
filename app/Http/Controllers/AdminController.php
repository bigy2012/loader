<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Add this import statement
use Illuminate\Support\Facades\DB;
use App\Models\Visit; // Add this import statement

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $visits = Visit::all();
        $visitCount = $visits->count();
        $Post = Post::all();
        $PostCount = $Post->count();
        $Categorys = DB::table('categorys')->get();
        $CategorysCount = $Categorys->count();
        return view('admin/home', ['visitCount' => $visitCount, 'PostCount' => $PostCount, 'CategoryCount' => $CategorysCount]);
    }
}
