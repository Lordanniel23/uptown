<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class passwordModel extends Model
{
    use HasFactory;
    public function checkuserid($username){
        $user = DB::table('users')
        ->select('id') 
        ->where('username',$username)
        ->get(1);
        return $user;
    }
    public static function change($ids,$user){
        $user = 'sdasd';
    }
}