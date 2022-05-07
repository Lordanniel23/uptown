<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    use HasFactory;
    public static function createwithimage($name,$image){ 
        $newid      = DB::select("select * FROM category_menu");
        $newid      =   count($newid) + 1;
        DB::table('category_menu')
        ->insert([
            'id'                => $newid,
            'Name'             =>   $name,
            'Image'             =>  $image,
            'status_id'             =>  1,
        ]);
    }
    public static function createnoimage($name){ 
        $newid      = DB::select("select * FROM category_menu");
        $newid      =   count($newid) + 1;
        DB::table('category_menu')
        ->insert([
            'id'                => $newid,
            'Name'             =>   $name,
            'Image'             =>  'images\icons\alldaybreakfast.png',
            'status_id'             =>  1,
        ]);
    }
    public static function updatewithimage($id,$name,$imagez){ 

        DB::table('category_menu')
        ->where('id',$id)
        ->update([
            'name'             =>   $name,
            'image'             =>  $imagez,
            
        ]);
    }
    public static function updatenoimage($id,$name){ 

        DB::table('category_menu')
        ->where('id',$id)
        ->update([
            'name'             =>   $name,
            'image'             =>  'images\icons\alldaybreakfast.png',
        ]);
    }
    public function archived($id){ 

        DB::table('category_menu')
        ->where('id' ,$id)
        ->update([
            'status_id'             =>  2,
        ]);
    }
    public function restore($id){
        DB::table('category_menu')
        ->where('id',$id)
        ->update([
            'status_id'         =>   1   ,
        ]);
    }
    public function deletes($id){
        DB::table('category_menu')
        ->where('id' ,$id)
        ->delete();
    }
}

