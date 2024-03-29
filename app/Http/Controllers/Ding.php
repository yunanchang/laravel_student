<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class Ding extends Controller
{
    public function index(){
        return view('animal',['name'=>'<h1>老王</h1>','sex'=>'男','point'=>80,'abc'=>0]);

    }


    public function  dbtest(){
        $users = DB::select('select * from users');
            // dd($users);
        // return view('user.index', ['users' => $users]);
        $ue=DB::table('users')->where('name','=','abc')->get();

           dump($ue);
        // $name=DB::table('users')->where('name','=','abc')->pluck('email');
        // dump($name);
        $group=DB::table('users')->groupBy('name')->select('name',DB::raw('count(*) as count'))->get();
        dump($group);
        $list=DB::table('users')->whereIn('password',['1234','abc'])->get();
        dump($list);

    }
}