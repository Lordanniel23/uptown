<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accountModel extends Model
{
    use HasFactory;
    public static function user($id){
        $user = DB::table('users')
        ->select('*')
        ->where('id',$id)
        ->get();
        return $user;
    }
}
 