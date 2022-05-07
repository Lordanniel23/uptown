<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\models\accountModel;


class accountController extends Controller
{
    public static function index($id){
        // dd(Auth::user()->id);
        $id = Auth::user()->id;
        $roles = DB::select("Select * from roles");
        $questions = DB::select("Select * from questions");
        $user = DB::select("Select * from users");
        $answers = DB::table('answers')
        ->select('*')
        ->where('id',$id)
        ->get(1);
        // dd($answers[0]);
        return view('/accountsetting',compact('roles','questions','user','answers'));
    }
    public static function update(Request $request){
        // dd(Auth::user());
        $id = Auth::user()->id;
        $password   = Auth::user()->password;
        $user       =   accountModel::user($id);
        // dd(Auth::user());
        //if password is correct
    if (Hash::check($request -> input('password'),$password ))
    {
        $data['id']             = $request -> input('id');
        $data['username']       = $request -> input('username');
        $password1              = $request -> input('password1');
        $password2              = Hash::make($request -> input('password2'));
        $data['question1']      = $request -> input('question1');
        $data['answer1']        = Hash::make($request -> input('answer1'));
        $data['question2']      = $request -> input('question2');
        $data['answer2']        = Hash::make($request -> input('answer2'));
        $images                 = $request -> file('image');
        // dd($data);
        //if new password is same
        if ($password1 != null OR $password1 != null){
        if (Hash::check($password1,$password2 )){
            $data['password'] = Hash::make($password1);
            if ($images != null) {
                $images         = $request -> file('image');
                $image          = $images[0]->getClientOriginalName();
                $imagename      = str_replace(' ','-',$image);
                $path           = 'images/employee/'.$data['id'];
                $data['image']  = "/".$path."/".$imagename;
                // dd($data['image']);
                File::deleteDirectory(public_path($path));
                    foreach ($images as $file) {
                        $file -> move($path , $imagename); 
                    }
            $test = newaccountModel::securityquestion($data['id'],$data['question1'],$data['answer1'],$data['question2'],$data['answer2']);
            $test = newaccountModel::createwithimage($data['id'],$data['username'],$data['password'],$data['image']);
            return redirect('admin');
            }else{
            $data['image']  = $user[0]->image;
            $test = newaccountModel::securityquestion($data['id'],$data['question1'],$data['answer1'],$data['question2'],$data['answer2']);
            $test = newaccountModel::createnoimage($data['id'],$data['username'],$data['password'],$data['image']);
            return redirect('admin');
            }
            }
        }
    else{
        dd('wrong password');
    }
    }
    }
}
