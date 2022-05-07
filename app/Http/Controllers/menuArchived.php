<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\models\menuArchivedModel;
class menuArchived extends Controller
{
    public static function archive()
    {
        $roles = DB::select("Select * from roles");
        $user = DB::select("Select * from users");
        $menus = DB::select("Select * from menu");

        $status = DB::select("Select * from status_menu where id != 3");
        $category = DB::select("select * from category_menu where status_id != 2;");

        return view('admin/menu.archived', compact('menus','roles','user','status','category'));
    }
    public static function restore($id)
    {
        $name = DB::select("Select name from menu where id = '$id'");
        $name = $name[0]->name;
        toastr()->success($name . ' Restored Successfully!');
        $archives = menuArchivedModel::restore($id);
        return redirect('admin/menu/archived');
    }
    public static function delete($id)
    {
        toastr()->error('Menu Deleted Successfully!');
        $deletes = menuArchivedModel::deletes($id);
        return redirect('admin/menu/archived');
    }
}
