<?php

namespace App\Http\Controllers;

use App\Models\Categorys as ModelsCategorys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Category extends Controller
{
    public function index()
    {
        $data = DB::table('categorys')->get();
        return view('admin/category', ['data' => $data]);
    }
    public function CategoryGetById(Request $request)
    {
        $data = DB::table('categorys')->where('id', $request->id)->first();
        return $data;
    }
    public function Process(Request $request)
    {
        if ($request->process == 'add') {
            $category = new ModelsCategorys();
            $category->category_name = $request->category_name;
            $category->status = '1';
            $category->save();
        }
        elseif($request->process == 'edit'){
            $category = ModelsCategorys::find($request->category_id);
            $category->category_name = $request->category_name;
            $category->save();
        }
        elseif($request->process == 'delete'){
            $category = ModelsCategorys::find($request->category_id);
            $category->status = '0';
            $category->save();
        }
        return redirect('/admin/category');
    }
}
