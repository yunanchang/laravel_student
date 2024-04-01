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
    // 關閉自動時間戳
    public $timestamps=false;
    // 添加時設置不准許添加的字段
    // 使用了 $fillable 屬性，則只有在 $fillable 屬性中列出的屬性可以被批量賦值；
    // 如果使用了 $guarded 屬性，則只有 $guarded 屬性中未列出的屬性可以被批量賦值。
    protected $guarded=[];


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
            ->select('m.major', 'student.id', 'student.birthday', 'student.name', 'student.sex', 'student.age','student.deleted_at','student.headimg');
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

    public function getbirthdayAttribute($value)
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

// 添加方法

    public static function add($post,$file){
        try{
            unset($post['_token']);
            if(!$file){
                return ['error'=>2,'msg'=>'請上船頭像'];
            }


            $post['birthday']=strtotime($post['birthday']);
            $path=$file->store('photo','ding');
            // dd($path);
            $post['headimg']=$path;
            self::create($post);
            $arr=['error'=>0,'msg'=>'添加成功'];
        }catch(Exception $e){
            $arr=['error'=>1,'msg'=>'添加失敗','eMsg'=>$e->getMessage()];
        
        }
        return $arr;
    }
}
