<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Hash;
use File;

class settingController extends Controller
{
    public static function one(Request $Request){
        // dd($Request);
        $Request->validate([
            'username' => 'min:8|required',
        ]);

        $images     =   $Request ->  file('image');
        $id         =   $Request ->  input('id');
        $username   =   $Request ->  input('username');
        // dd($image);
        if ($images != null) {
            // dd('theres image');
        $status_table = DB::update("update users set username = '$username' where id = $id ");

        // dd($images);

        $image          = $images[0]->getClientOriginalName();
        $imagename      = str_replace(' ','-',$image);
        $path           = 'images/employee/'.$id;
        $newimage  = "/".$path."/".$imagename;
        $udpateimage = DB::update("update users set image = '$newimage' where id = $id ");
        // dd($data['image']);
        File::deleteDirectory(public_path($path));
            foreach ($images as $file) {
                $file -> move($path , $imagename); 
            }
        }else{
        $status_table = DB::update("update users set username = '$username' where id = $id ");
        }
        toastr()->success('Account Updated Successfully!');
        return redirect('/settings/'.$id);
        dd("end");
    }
    public static function two(Request $Request){
        // dd($Request); 
        $Request->validate([
            'oldpassword' => '|required',
            'password' => 'min:8|required|confirmed',
            'password_confirmation' => 'min:8|required',
        ]);
        
        $id                     =   $Request ->  input('id');
        $oldpassword            =   $Request ->  input('oldpassword');
        $password               =   $Request ->  input('password');
        $password_confirmation  =   $Request ->  input('password_confirmation');
        // dd($id);

        $pass = DB::select("SELECT password FROM users where id = '$id' ;");

        if (Hash::check($oldpassword, $pass[0]->password)) {
        // dd('asdasd');
        $newpass = Hash::make($password);
        $status_table = DB::update("update users set password = '$newpass' where id = $id ");
        toastr()->success('Account Password Updated Successfully!');
        return redirect('/settings/'. $id);
        }else{
        dd('d same');
            
        }
    }
    public static function three(Request $request){

        // dd($Request); 
        $id     =   $request -> input('id');
        $request->validate([
            'question1' => 'required',
            'answer1' => 'required',
            'question2' => 'required',
            'answer2' => 'required',
        ]);
        $question1      = $request -> input('question1');
        $answer1        = Hash::make($request -> input('answer1'));
        $question2      = $request -> input('question2');
        $answer2        = Hash::make($request -> input('answer2'));
        toastr()->success('Security question updated Successfully!');
        $pass = DB::select("update answers set q_one = '$question1' , q_two = '$question2' , q_one_answer = '$answer1' , q_two_answer = '$answer2'");
        return redirect('/settings/'. $id);
    }
}
 