<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeoController extends Controller
{
    public function index()
    {
        $seo = DB::table('seos')->get();
        return view('admin/seo', ['seo' => $seo]);
    }
    public function process(Request $request)
    {
        $seo = $request->seo;

        if (isset($seo)) {
            foreach ($seo as $key => $value) {
                if ($value['action'] == 'add') {
                    $Seo = new Seo();
                    $Seo->value = $value['value'];
                    $Seo->status = '1';
                    $Seo->save();
                }
            }

            foreach ($seo as $key => $value) {
                if ($value['action'] == 'update') {
                    $Seo = Seo::find($value['id']);
                    $Seo->value = $value['value'];
                    $Seo->save();
                }
            }
        }

        if ($request->action == 'delete') {
            $Seo = Seo::find($request->id);
            $Seo->status = '0';
            $Seo->save();

            return $Seo;
        }


        return redirect('/admin/seo');
    }
}
