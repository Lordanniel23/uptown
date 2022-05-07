<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
Use App\models\menuModel;
use File;
use Validator; 
use auth;
class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = DB::select("Select * from roles");
        $menus = DB::select("Select * from menu");
        $users = DB::select("Select * from users");
        $status = DB::select("Select * from status_menu where id != 3");
        $category = DB::select("select * from category_menu where status_id != 2;");
        $subcategory = DB::select("select * FROM sub_category_menu;");
        $submenus = DB::select("Select * from submenu where status_id != 3");
        $menu_submenu = DB::select("select * from menu_submenu ");
        

        // dd($menus);
        return view('admin/menu.index', compact('menus','roles','users','status','category','subcategory','submenus','menu_submenu'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkMenu(Request $request)
    {
        $input = $request->only(['name']);

        $request_data = [
            'name' => 'required|unique:name',
        ];

        $validator = Validator::make($input, $request_data);

        // json is null
        if ($validator->fails()) {
            $errors = json_decode(json_encode($validator->errors()), 1);
            return response()->json([
                'success' => false,
                'message' => array_reduce($errors, 'array_merge', array()),
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'The email is available'
            ]);
        }
    }
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
            'name' => 'required|unique:menu',
            'price' => 'required',
            'category' => 'required',

        ]);
        $id = DB::select("select id FROM uptown.menu order by id desc limit 1");
        $id = $id[0]->id + 1;
        $data['id']             = $request -> input('id');
        $data['name']           = $request -> input('name');
        $data['price']          = $request -> input('price');
        $data['description']    = $request -> input('desc');
        $data['category']       = $request -> input('category');
        $data['sub_category']   = $request -> input('sub_category');
        $images                 = $request -> file('image');
        // dd($id);   
        if ($images != null) {
            $images         = $request -> file('image');
            $image          = $images[0]->getClientOriginalName();
            $imagename      = str_replace(' ','-',$image);
            $path           = 'images\menu\\'.$id;
            $data['image']  = $path."\\".$imagename;
            File::deleteDirectory(public_path($path));
                foreach ($images as $file) {
                    $file -> move($path , $imagename); 
                }
        $test = menuModel::createwithimage($id,$data['name'],$data['price'],$data['description'],$data['category'],$data['sub_category'],$data['image']);
        toastr()->success($data['name'] .' Added Successfully!','Menu');
        return redirect('admin/menu');

        }else{
        toastr()->success($data['name'] .' Added Successfully!','Menu');
        $test = menuModel::createnoimage($id,$data['name'],$data['price'],$data['description'],$data['category'],$data['sub_category']);
        return redirect('admin/menu');
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
        $roles = DB::select("Select * from roles");
        $menus = DB::select("Select * from menu ");
       
        $category = DB::select("select * from category_menu where status_id != 2;");
        $subcategory = DB::select("select * FROM sub_category_menu;");
        $status_menu = DB::select("select * FROM status_menu where id != 3;");
        $menu = menuModel::menu($id);
        // dd($menu);
        return view('admin/menu.editmenu',compact('menu','roles','menus','category','subcategory','status_menu'));
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
        $data['id']             = $id;
        $data['name']           = $request -> input('name');
        $data['price']          = $request -> input('price');
        $data['description']    = $request -> input('desc');
        $data['category']       = $request -> input('category');
        $data['sub_category']   = 0;
        $data['status']         = $request -> input('status');
        $images                  = $request -> file('image');
        toastr()->success($data[ 'name'] . ' Updated Successfully!');

        // dd($data);             
        if ($images != null) {
            $images          = $request -> file('image');
            $image    = $images[0]->getClientOriginalName();
            $imagename = str_replace(' ','-',$image);
            $path = 'images\menu\\'.$data['id'];
            $data['image'] = $path."\\".$imagename;
            File::deleteDirectory(public_path($path));
                foreach ($images as $file) {
                    $file -> move($path , $imagename); 
                }
        $test = menuModel::updatewithimage($data['id'],$data['name'],$data['price'],$data['description'],$data['category'],$data['sub_category'],$data['image']);
        return redirect('admin/menu');
        }else{
        $test = menuModel::updatenoimage($data['id'],$data['name'],$data['price'],$data['description'],$data['category'],$data['sub_category']);
        return redirect('admin/menu');
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
        $name = DB::select("Select name from menu where id = '$id'");
        $name = $name[0]->name;
        toastr()->success($name . ' archived Successfully!','Menu');
        $archive = menuModel::archived($id);
        return redirect('admin/menu');
    }
    public static function disablemenu($id){
        toastr()->success('Menu Disabled Successfully!');
        $menu = DB::select("UPDATE menu SET status_id = 2 where id = $id");
        return redirect('/cashier');
    }
    public static function enablemenu($id){
        toastr()->success('Menu Enabled Successfully!');
        $menu = DB::select("UPDATE menu SET status_id = 1 where id = $id");
        return redirect('/cashier');
    }
    public static function disablemenuk($id){
        toastr()->success('Menu Disabled Successfully!');
        $menu = DB::select("UPDATE menu SET status_id = 2 where id = $id");
        return redirect('/kitchen');
    }
    public static function enablemenuk($id){
        toastr()->success('Menu Enabled Successfully!');
        $menu = DB::select("UPDATE menu SET status_id = 1 where id = $id");
        return redirect('/kitchen');
    }
    public static function submenu(Request $request){
        // dd($request);
        $id             = $request -> input('id');
        $name           = $request -> input('number');
        $createdby        =  Auth::user()->id;
        $arrays= preg_split("/[,]/",$name);
        $menus = DB::select("select * from menu_submenu where menu_id = $id");
        if ($menus != null) {
            foreach ($menus as $menu) {
            $menus = DB::select("delete from menu_submenu where id = $menu->id");
        }
    }else{
    }
    // dd($arrays);
    foreach ($arrays as $array) {
        $test = DB::select("insert into menu_submenu (menu_id,submenu_id,created_by) values ('$id','$array','$createdby')");
    }
    toastr()->success( 'submenu created Successfully!');
    return redirect('admin/menu');

        // print_r($b);
    }
}
