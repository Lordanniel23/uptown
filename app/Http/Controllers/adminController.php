<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use auth;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $id = Auth::user()->role_id;
        $roles = DB::select("Select * from roles");
        $role = DB::select("Select roles.role from roles,users where users.role_id = roles.id and users.id = $id");
        $users = DB::select("Select * from users"); 
        $totalmenuavailable = DB::select("SELECT count(*) as 'menu' FROM uptown.menu;"); 
        $totalmenuunavailable = DB::select("SELECT count(*) as 'menu' FROM uptown.menu where status_id =2"); 
        $totalmenuarchived = DB::select("SELECT count(*) as 'menu' FROM uptown.menu where status_id =3;"); 
        $populars = DB::select("SELECT menu.id,menu.Name,menu.Price,count(menu_id) as 'count' FROM orders,menu where menu.id = orders.Menu_id group by menu_id having count(menu_id) > 1 order by count desc limit 6;"); 
        $totaltable = DB::select("SELECT count(*) as 'table' FROM uptown.tables where table_status_id != 4;"); 
        $discount = DB::select("SELECT count(*) as 'discount' FROM uptown.discount where status != 3 and id != 3;"); 
        $address = DB::select("SELECT * FROM systemsettings where id = 1;"); 
        $phonenumber = DB::select("SELECT * FROM systemsettings where id = 2;"); 
        return view('admin.index', compact('users','roles','totalmenuavailable','totalmenuunavailable','totalmenuarchived','populars','role','totaltable','discount','address','phonenumber'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function address(Request $request){
        $address=$request->address;
        // dd($address);
        $menus = DB::select("UPDATE systemsettings SET description ='$address' WHERE id = 1 ");
        toastr()->success('Address Updated Successfully!');
        return redirect('admin');

      }
      public function phonenumber(Request $request){
        $address=$request->address;
        // dd($address);
        $menus = DB::select("UPDATE systemsettings SET description ='$address' WHERE id = 2 ");
        toastr()->success('Phone Number Updated Successfully!');
        return redirect('admin');

      }
}
