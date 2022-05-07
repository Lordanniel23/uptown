<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newaccountModel extends Model
{
    use HasFactory;
    public static function createwithimage($id,$username,$password,$image){
        DB::table('users')
        ->where('id',$id)
        ->update([
            'Answers_id'        =>   $id,
            'username'          =>   $username,
            'password'          =>   $password,
            'image'             =>   $image, 
            'status_id'         =>   2,
        ]);
    }
    public static function createnoimage($id,$username,$password,$image){
        DB::table('users')
        ->where('id',$id)
        ->update([
            'Answers_id'        =>   $id,
            'username'          =>   $username,
            'password'          =>   $password,
            'image'             =>   $image, 
            'status_id'         =>   2,
        ]); 
    }
    public static function securityquestion($id,$question1,$answer1,$question2,$answer2){
        DB::table('answers')
        ->insert([
            'id'                =>   $id,
            'q_one'             =>   $question1, 
            'q_one_answer'      =>   $answer1,
            'q_two'             =>   $question2,
            'q_two_answer'      =>   $answer2,
        ]);
    }
    public static function user($id){
        $user = DB::table('users') 
        ->select('*')
        ->where('id',$id)
        ->get();
        return $user;
    }
}

 