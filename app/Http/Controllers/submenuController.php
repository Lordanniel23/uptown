<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
Use App\models\menuModel;
use File;
use Validator; 
use Auth;

class submenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = DB::select("Select * from roles");
        $users = DB::select("Select * from users");
        $submenus = DB::select("Select * from submenu where status_id != 3");
        $status = DB::select("Select * from status_submenu where id != 3");
        return view('admin/submenu.index', compact('submenus','roles','users','status'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $category = DB::select("select * from category_menu where status_id != 2;");
        $subcategory = DB::select("select * FROM sub_category_menu;");
        $status_menu = DB::select("select * FROM status_menu;");
        $roles = DB::select("Select * from roles");
        $menu = DB::select("Select * from menu");
        $users = DB::select("Select * from users");
    
        return view('admin/menu.createmenu', compact('menu','roles','users','category','subcategory','status_menu'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|unique:submenu',
            'price' => 'required',
        ]);
        $name           = $request -> input('name');
        $price          = $request -> input('price');
        $images         = $request -> file('image');
        $createdby        =  Auth::user()->id;
        // dd($id);   
        if ($images != null) {
            $id = DB::select("select id FROM uptown.submenu order by id desc limit 1");
            $id = $id[0]->id + 1;
            $images         = $request -> file('image');
            $image          = $images[0]->getClientOriginalName();
            $imagename      = str_replace(' ','-',$image);
            $path           = 'images/submenu/'.$id;
            $imahe  = $path."/".$imagename;
            // dd($imahe);
            File::deleteDirectory(public_path($path));
                foreach ($images as $file) {
                    $file -> move($path , $imagename); 
                }
        $test = DB::select("insert into submenu (name,price,image,status_id,created_by) values ('$name','$price','$imahe',1,'$createdby')");
        toastr()->success($name .' Added Successfully!','SUBMENU CREATE');
        return redirect('admin/submenu');

        }else{//no image
            $test = DB::select("insert into submenu (name,price,image,status_id,created_by) values ('$name','$price','images/submenu.png',1,'$createdby')");
            toastr()->success($name .' Added Successfully!','SUBMENU CREATE');
        return redirect('admin/submenu');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $id             = $request -> input('id');
        $name           = $request -> input('name');
        $price          = $request -> input('price');
        $status         = $request -> input('status');
        $images         = $request -> file('image');
        $updatedby      =  Auth::user()->id;


        toastr()->success($name . ' Updated Successfully!');

        // dd($data);             
        if ($images != null) {
            $images          = $request -> file('image');
            $image    = $images[0]->getClientOriginalName();
            $imagename = str_replace(' ','-',$image);
            $path           = 'images/submenu/'.$id;
            $imahe  = $path."/".$imagename;
            File::deleteDirectory(public_path($path));
                foreach ($images as $file) {
                    $file -> move($path , $imagename); 
                }
            $test = DB::select("UPDATE submenu set name = '$name',price = '$price', status_id = '$status',image = '$imahe',updated_by = '$updatedby' where id = $id");
        return redirect('admin/submenu');
        }else{
            $test = DB::select("UPDATE submenu set name = '$name',price = '$price', status_id = '$status',updated_by = '$updatedby' where id = $id");
        return redirect('admin/submenu');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy($id)
    {
        // dd('archive');
        $name = DB::select("Select name from submenu where id = '$id'");
        $name = $name[0]->name;
        $test=DB::select("update submenu set status_id=3 where id=$id" );
        toastr()->success($name . ' archived Successfully!','SUBMENU ARCHIVE');
        return redirect('admin/submenu');
    }
    public static function archived()
    {
        // dd('archive');
        $roles = DB::select("Select * from roles");
        $users = DB::select("Select * from users");
        $submenus = DB::select("Select * from submenu where status_id = 3");
        $status = DB::select("Select * from status_submenu where id != 3");
        return view('/admin/submenu.archived', compact('submenus','roles','users','status'));
    }
    public static function restore($id)
    {
        // dd($id);
        $name = DB::select("Select name from submenu where id = '$id'");
        $name = $name[0]->name;
        $test=DB::select("update submenu set status_id=1 where id=$id" );
        toastr()->success($name . ' restored Successfully!','SUBMENU RESTORE');
        return redirect('admin/submenu/archived');
    }
}
