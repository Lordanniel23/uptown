<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
Use App\models\userArchivedModel;
use Hash;
use Carbon\Carbon;



class userArchived extends Controller
{
    public static function archive()
    {
        $roles = DB::select("Select * from roles");
        $users = DB::select("Select * from users");
        return view('admin/employee.archived', compact('users','roles'));
    }
    public static function restore($id)
    {
        toastr()->success('Employee Restored Successfully!');
        // dd($id);
            $archives = userArchivedModel::restore($id);
            return redirect('admin/employee/archived');
    }
    public static function delete($id)
    {
        toastr()->error('Employee Deleted Successfully!');
        $deletes = userArchivedModel::deletes($id);
        return redirect('admin/employee/archived');
    }
    public static function reset($id){
        // dd('works');
        toastr()->error('User Reset Successfully!');
        $today = Carbon::today();
        $password = Hash::make('uptowngrill');
        $reset = userArchivedModel::reset($id,$password,$today);
        DB::table('answers')->where('id' ,$id)->delete();
        return redirect('admin/employee');

    }
}
