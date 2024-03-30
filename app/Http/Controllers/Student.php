<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student as StudentModel;

class Student extends Controller
{
  
    public function list(Request $request){

        $gets=$request->query();
        dump($gets);

        $list=StudentModel::list($gets);
        dump($list);
        return view(
            'list',['list'=>$list,'gets'=>$gets]
        );
    }
    
}
