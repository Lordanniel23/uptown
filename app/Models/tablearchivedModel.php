<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tablearchivedModel extends Model
{
    use HasFactory;
    public static function restore($id){
        DB::table('users')
        ->where('id' ,$id)
        ->update([
            'status_id' => 2,
        ]);
    }
    public static function deletes($id){
        DB::table('users')
        ->where('id' ,1)
        ->delete();
    }
}
