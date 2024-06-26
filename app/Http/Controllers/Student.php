<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

use App\Models\Student as StudentModel;


use App\Http\Requests\StudentRequest;


class Student extends Controller
{
    
   

    public function list(Request $request)
    {

        $gets = $request->query();
        dump($gets);

        $list = StudentModel::list($gets);
        dump($list);
        // 查詢全部專業
        $majors = Major::get();
        dump($majors);
        return view(
            'list',
            ['list' => $list, 'gets' => $gets, 'majors' => $majors]
        );
    }


    public static function del($id)
    {

        $rt = StudentModel::del($id);
        dump($rt);
        // if($rt['error']==0){
        //      return showMessage(['success'=>$rt['msg'],'url'=>'/list','time'=>5]);
        // }else{
        //      return showMessage(['error'=>$rt['msg'],'time'=>5]);
        // }            
    }

    public function add()
    {
        // 查詢專業
        $majors = Major::get();
        return view('add', ['majors' => $majors]);
    }

    public function save(StudentRequest $request)
    {
        $post = $request->post();
        $file=$request->file('logo');
        // dd($file);
        dump($post);
        $rt=StudentModel::add($post,$file);
        dd($rt);
    }

}
