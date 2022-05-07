<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class userArchivedModel extends Model
{
    use HasFactory;
    public static function restore($id){
        DB::table('users')
        ->where('id' ,$id)
        ->update([
            'status_id' => 2,
        ]);
    }
    // public static function deletes($id){
    //     DB::table('users')
    //     ->where('id' ,$id)
    //     ->delete();
    // }
    public static function reset($id,$password,$today){
        DB::table('users')
        ->where('id',$id)
        ->update([
            'status_id' => 1,
            'password' => $password,
            'reset_by' => Auth::user()->id,
            'reset_at' => $today,
            'Answers_id' => null,
        ]);
    }
}
