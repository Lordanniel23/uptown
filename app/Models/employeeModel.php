<?php

namespace App\Models;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeeModel extends Model
{
    use HasFactory;




    public static function create($name,$username,$password,$role,$createdby){
        DB::table('users')
        ->insert([
            'name'              =>   $name,
            'username'          =>   $username, 
            'password'          =>   $password,
            'role_id'           =>   $role,
            'status_id'         =>   1,
            'image'             =>  '/images/profile/default.png',
            'created_by'         =>   $createdby
        ]);
    }


    public static function user($id){
        $user = DB::table('users')
        ->select('*')
        ->where('id',$id)
        ->get(1);
        return $user[0];
    }
    public static function updates($id,$name,$username,$role_id){
        DB::table('users')
        ->where('id' ,$id)
        ->update([
            'name'          =>  $name,
            'username'      =>  $username,
            'role_id'       =>  $role_id, 
            
        ]);
    }
    public static function destroy($id){
        $mytime = Carbon::now();
        DB::table('users')
        ->where('id' ,$id)
        ->update([
            'status_id' => 3,
            'archived_at' => $mytime,
        ]);
    }
}
