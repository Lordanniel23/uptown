<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;
Use App\models\tableModel;

class tableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id     = Auth::user()->id;
        $roles  = DB::select("Select * from roles");
        $user   = DB::select("Select * from users");
        $tables = DB::select("Select * from tables where table_status_id != 5");
        $status_table = DB::select("Select * from status_table");
        return view('/admin/table.index',compact('roles','user','tables','status_table'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table      = DB::select("select * FROM tables where table_status_id != 5 order by id desc limit 1");
        $table = $table[0]->id;
        // dd($table);
        toastr()->success('Table ' . $table . ' Added Succesfully!','CREATE TABLE');
        $archive = tableModel::addtable();
        return redirect('admin/table');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('store');
            return redirect('admin/table');
        
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
        dd('edit');

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
        dd($id);
        $status   =  $request -> input('status');
        if($status == 'en'){
            toastr()->success('Table Enabled Successfully!');
            dd($status);
            $archive = tableModel::enable($id);
            return redirect('admin/table');
            
        }elseif($status == 'dis'){
            dd($status);
            $archive = tableModel::disable($id);
            toastr()->success('Table Disabled Successfully!');
            return redirect('admin/table');
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
        $table    =  DB::select("select * FROM tables where table_status_id != 5");
        $table = count($table)  ;
        $tables      =  DB::select("select * FROM tables where table_status_id != 2 and table_status_id != 3 and table_status_id != 5 and id = $table  order by id desc limit 1");
        if ($tables == null) {
            toastr()->error('Failed! . table '. $table .'  is Still in Use!','TABLE REDUCE');
            return redirect('admin/table');
        }else{
            $archive = tableModel::archived($id);
            toastr()->warning('Table '. $table .' Removed Successfully!','REMOVE TABLE');
            return redirect('admin/table');
        }

    }
   
}
