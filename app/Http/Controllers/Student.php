<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

use App\Models\Student as StudentModel;

class Student extends Controller
{
  
    public function list(Request $request){

        $gets=$request->query();
        dump($gets);

        $list=StudentModel::list($gets);
        dump($list);
        // 查詢全部專業
        $majors=Major::get();
        dump($majors);
        return view(
            'list',['list'=>$list,'gets'=>$gets,'majors'=>$majors]
        );
    }
    
}
