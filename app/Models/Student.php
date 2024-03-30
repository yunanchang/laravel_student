<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student as s';
    protected $primarykey = 'id';
    // -----------------------------------
    // public static function list($gets){
    //     $list=self::join('major as m','s.m_id','=','m.id')
    //     ->select('m.major','s.id','s.headimg','s.name','s.sex','s.age')
    //     ->get();
    //     return $list;
    // }
    // ---------------------------------------
    public static function list($gets)
    {
        $obj = self::join('major as m', 's.m_id', '=', 'm.id')
            ->select('m.major', 's.id', 's.headimg', 's.name', 's.sex', 's.age');
        //   搜索判斷
        if (isset($gets['key']) and $gets['key'] != '') {
            $obj->where('s.name','like',"%{$gets['key']}%");
        }
        if(isset($gets['sex'])and $gets['sex']!=''){
            $obj->where('s.sex',$gets['sex']);
        }

        $list = $obj->get();
        return $list;
    }
    // 獲取器

    public function getheadimgAttribute($value)
    {
        return  $value ? date('Y-m-d', $value) : '';
    }
}
