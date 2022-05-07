<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuArchivedModel extends Model
{
    use HasFactory;
    public static function restore($id){
        DB::table('menu')
        ->where('id' ,$id)
        ->update([
            'status_id' => 1,
        ]);
    }
    public static function deletes($id){
        DB::table('menu')
        ->where('id' ,$id)
        ->delete();
    }
}
