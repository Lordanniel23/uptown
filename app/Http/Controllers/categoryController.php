<?php

namespace App\Http\Controllers;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
Use App\models\CategoryModel;


class categoryController extends Controller
{

    public function name(Request $request){
        $name=$request->name;
        $validation = DB::select("SELECT * FROM category_menu where name = '$name'");
        return $validation;
      }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = DB::select("Select * from roles");
        $categories = DB::select("SELECT * FROM uptown.category_menu where status_id != 2;");
        return view('admin/category.index', compact('categories','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::select("Select * from roles");
        $categories = DB::select("SELECT * FROM uptown.category_menu;");
        return view('admin/category.createcategory', compact('categories','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd('store'); 
        $name                   = $request -> input('name');
        $images                 = $request -> file('image');
        $categories = DB::select("SELECT * FROM uptown.category_menu;");
        $categories = count($categories);
        $categories = $categories + 1;
        // dd($categories);
        // dd($data);   
        if ($images != null) {
            $images          = $request -> file('image');
            $image    = $images[0]->getClientOriginalName();
            $imagename = str_replace(' ','-',$image);
            $path = 'images\category\\'.$categories;
            $data['image'] = $path."\\".$imagename;
            File::deleteDirectory(public_path($path));
                foreach ($images as $file) {
                    $file -> move($path , $imagename); 
                }
        $test = categoryModel::createwithimage($name,$data['image']);
        toastr()->success($name . ' Created Successfully!','Category');
        return redirect('admin/category');
        }else{
        toastr()->success($name . ' Category Created Successfully!','Category');
        $test = categoryModel::createnoimage($name);
        return redirect('admin/category');
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
        //
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
        $categories = DB::select("SELECT * FROM uptown.category_menu where id = $id;");
        // dd($categories);
        $categories = $categories[0]; 
        return view('admin/category.editcategory', compact('categories','roles'));
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
        $images                 = $request -> file('image');
        // dd($data);
        toastr()->success($data['name'] . ' Updated Successfully!','CATEGORY LIST');        
        if ($images != null) {
            $images          = $request -> file('image');
            $image    = $images[0]->getClientOriginalName();
            $imagename = str_replace(' ','-',$image);
            $path = 'images\menu\\'.$data['id'];
            $imagez = $path."\\".$imagename;
            File::deleteDirectory(public_path($path));
                foreach ($images as $file) {
                    $file -> move($path , $imagename); 
                }
                // dd($imagez);
        $test = categoryModel::updatewithimage($data['id'],$data['name'],$imagez);
        return redirect('admin/category');
        }else{
        $test = categoryModel::updatenoimage($data['id'],$data['name']);
        return redirect('admin/category');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name = DB::select("SELECT * FROM uptown.category_menu where id = $id;");
        $name = $name[0]->name;
        toastr()->success($name . '  archived successfully!','CATEGORY LIST');
        $archive = categoryModel::archived($id);
        return redirect('admin/category');
    }
    public function archived()
    {
        $roles = DB::select("Select * from roles");
        $categories = DB::select("SELECT * FROM uptown.category_menu where status_id != 1;");
        return view('admin/category.archived', compact('categories','roles'));
    }
    public static function restore($id)
    {
        $name = DB::select("SELECT * FROM uptown.category_menu where id = $id;");
        $name = $name[0]->name;
        toastr()->success($name . '  restored successfully!','ARCHIVED CATEGORY');
        $test = categoryModel::restore($id);
        return redirect('admin/category/archived');

    }
    // public static function deletes($id)
    // {
    //     toastr()->error('Category Deleted Successfully!');
    //     $test = categoryModel::deletes($id);
    //     return redirect('admin/category/archived');
    // }
}
