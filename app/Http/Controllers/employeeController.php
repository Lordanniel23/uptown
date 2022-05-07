<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
Use App\models\employeeModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;



class employeeController extends Controller
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
        return view('admin/employee.index', compact('users','roles'));
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
        // dd('store');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:8', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
        ]);

        $data['name']       = $request -> input('name');
        $data['username']   = $request -> input('username');
        $data['password']   =  Hash::make($request -> input('password'));
        $data['role']       = $request -> input('role');
        $data['createdby']  = Auth::user()->id;
        // dd($data);
        $test = employeeModel::create($data['name'],$data['username'],$data['password'],$data['role'],$data['createdby']);
        toastr()->success($data['name']   . ' created successfully!','USER CREATE');
        return redirect('admin/employee');

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
        $user = employeeModel::user($id);
        // dd($roles);

        return view('admin/employee.editemp',compact('user','roles'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $request->validate([ 
            'editname' => 'required',
            'editusername' => 'required|min:8',
            'editrole' => 'required',
        ]);
        $data['id']         = $request -> input('editid');
        $data['name']       = $request -> input('editname');
        $data['username']   = $request -> input('editusername');
        $data['role_id']    = $request -> input('editrole');
        // dd($data);
        toastr()->success($data['name'] . ' updated successfully!','USER UPDATE');
        $test = employeeModel::updates($data['id'],$data['name'],$data['username'],$data['role_id']);
        return redirect('admin/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name = DB::select("SELECT * FROM uptown.users where id = $id;");
        $name = $name[0]->name;

        toastr()->success($name . ' archived sucessfully!','USER ARCHIVE');
        $archive = employeeModel::destroy($id);
        // dd($id);
        return redirect('admin/employee');
    }
}
