<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 將use SoftDeletes;移至這裡

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'student';
    protected $primaryKey = 'id';
    public $timestamps=false;
    // -----------------------------------
    // public static function list($gets){
    //     $list=self::join('major as m','student.m_id','=','m.id')
    //     ->select('m.major','student.id','student.headimg','student.name','student.sex','student.age')
    //     ->get();
    //     return $list;
    // }
    // ---------------------------------------
    public static function list($gets)
    {
        $obj = self::from('student')
        ->join('major as m', 'student.m_id', '=', 'm.id')
            ->select('m.major', 'student.id', 'student.headimg', 'student.name', 'student.sex', 'student.age','student.deleted_at');
        //   搜索判斷
        if (isset($gets['key']) and $gets['key'] != '') {
            $obj->where('student.name','like',"%{$gets['key']}%");
        }
        if(isset($gets['sex'])and $gets['sex']!=''){
            $obj->where('student.sex',$gets['sex']);
        }
        if(isset($gets['mjs'])and $gets['mjs']!=''){
            $obj->whereIn('student.m_id',$gets['mjs']);
        }
        // $list = $obj->get();
        // paginate(分頁筆數)
        $list=$obj->paginate(10);
        return $list;
    }
    // 獲取器

    public function getheadimgAttribute($value)
    {
        return  $value ? date('Y-m-d', $value) : '';
    }

    // 刪除方法

    public static function del($id){
        try{
            self::destroy($id);
            $arr=['error'=>0,'msg'=>'刪除成功'];
        }catch(Exception $e){
            $arr=['error'=>1,'msg'=>'系統錯誤','eMsg'=>$e->getMessage()];
        }
        // return $arr;
        // return redirect()->back()->with('message', $arr['msg']);
        
        return redirect('/list')->with('message', $arr['msg']);
    }

   
}
