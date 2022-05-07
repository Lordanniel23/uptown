<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;


class discountController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('works');
        $discounts = DB::select("Select discount.id,discount.name,discount.Percentage,discount.abbr,status_discount.status from discount,status_discount where discount.status = status_discount.id and discount.status != 3 and discount.id != 3" );
        return view('admin/discount.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
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
        $name = $request->name;
        $discount = $request->discount;
        $abbr = $request->abbr;
        $roles = DB::select("INSERT INTO discount(name,Percentage,status,abbr) VALUES ('$name', '$discount','1','$abbr')");
        toastr()->success($name .' Created Successfully!');
        return redirect('admin/discount');
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
        dd('$id');
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
        $discount = $request->discount;
        $name = $request->name;
        $abbr = $request->abbr;
        // dd($name);
        $roles = DB::select("UPDATE discount SET Percentage = '$discount' , name = '$name' , abbr = '$abbr' WHERE id =$id");
        toastr()->success($name .' Updated Successfully!');
        return redirect('admin/discount');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        toastr()->success('Discount Archived Successfully!');
        $roles = DB::select("UPDATE discount SET status=3 WHERE id =$id ");
        return redirect('admin/discount');

    }

    //archived part
    public function archived()
    {
        $discounts = DB::select("Select discount.id,discount.name,discount.Percentage,status_discount.status,discount.abbr from discount,status_discount where discount.status = status_discount.id and discount.status = 3" );
        return view('admin/discount.archived', compact('discounts'));
    }
    public function restore($id)
    {
        $name = DB::select("Select name from discount where id = $id" );
        $name = $name[0]->name;
        toastr()->success($name . ' Restored Successfully!');
        $roles = DB::select("UPDATE discount SET status=1 WHERE id =$id ");
        return redirect('admin/discount/archived');
    }
}
