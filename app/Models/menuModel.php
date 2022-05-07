<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuModel extends Model
{
    use HasFactory;

    public static function menu($id){ 
        $menu = DB::table('menu')
        ->select('*')
        ->where('id',$id) 
        ->get(1);
        return $menu[0];
    }

    public function createwithimage($id,$name,$price,$description,$category,$sub_category,$image){ 
        DB::table('menu')
        ->insert([
            'id'                =>  $id,
            'Name'             =>   $name,
            'Price'             =>  $price, 
            'Description'       =>  $description,
            'Category_id'       =>  $category,
            'Sub_Category_Id'   =>  $sub_category,
            'Image'             =>  $image,
            'status_id'         =>  1,
        ]); 
    }
    public function createnoimage($id,$name,$price,$description,$category,$sub_category){ 

        DB::table('menu')
        ->insert([
            'id'                =>   $id,
            'Name'             =>   $name,
            'Price'            =>   $price, 
            'Description'      =>   $description,
            'Category_id'      =>   $category,
            'Sub_Category_Id'  =>   $sub_category,
            'Image'             =>  'images/menu.png',
            'status_id'         =>  1,
        ]);
    }
    public function updatewithimage($id,$name,$price,$description,$category,$sub_category,$image){ 

        DB::table('menu')
        ->where('id' ,$id)
        ->update([
            'Name'             =>  $name,
            'Price'            =>  $price, 
            'Description'      =>  $description,
            'Category_id'      =>  $category,
            'Sub_Category_Id'  =>  $sub_category,
            'Image'             =>  $image,
            'status_id'         =>  1,
        ]);
    }
    public function updatenoimage($id,$name,$price,$description,$category,$sub_category){ 

        DB::table('menu')
        ->where('id' ,$id)
        ->update([
            'Name'             =>  $name,
            'Price'            =>  $price, 
            'Description'      =>  $description,
            'Category_id'      =>  $category,
            'Sub_Category_Id'  =>  $sub_category,
            'status_id'        =>  1,


        ]);
    }
    public function archived($id){ 

        DB::table('menu')
        ->where('id' ,$id)
        ->update([
            'status_id'             =>  3,
        ]);
    }
}