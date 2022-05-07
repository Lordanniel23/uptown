<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tableModel extends Model
{
    use HasFactory;
    public static function archived($id){
        $table      =  DB::select("select * FROM tables where table_status_id != 2 and table_status_id != 3 and table_status_id != 5  order by id desc limit 1");
        // dd($table);

        $newtable   =  $table[0]->id;
        // dd($newtable);
        DB::table('tables')
        ->where('id' ,$newtable)
        ->update([
            'table_status_id' => 5,
        ]);
    }
    public static function enable($id){
        // dd($id);
        DB::table('tables')
        ->where('id' ,$id)
        ->update([
            'table_status_id' => 1,
        ]);
    }
    public static function disable($id){
        // dd($id);
        $tables = DB::table('tables')
        ->select('*') 
        ->where('id' ,$id)
        ->get();
        // dd($tables);
        DB::table('tables')
        ->where('id' ,$id)
        ->update([
            'table_status_id' => 4,
        ]);
    }
    public static function addtable(){

        $table      = DB::select("select * FROM tables where table_status_id != 5 order by id desc limit 1");
        $tables     = DB::select("select * FROM tables");
        $newtable   = $table[0]->id + 1;
        // dd($table[0]->id + 1);
        $exist = DB::table('tables')
        ->select('*')
        ->where('id',$newtable)
        ->get(1);
        // dd($exist);
        if(count($exist) != 0){
            // dd('pumasok');
            DB::table('tables')
            ->where('id' ,$exist[0]->id)
            ->update([
                'table_status_id'   =>   1, 
            ]);
        }else{
            DB::table('tables')
            ->insert([
                'id'                =>   $newtable,
                'tablename'         =>   $newtable, 
                'table_status_id'   =>   1, 
            ]);
        }

    }
}
