<?php

namespace App\Http\Controllers;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use App\models\newaccountModel;
use Illuminate\Validation\Rule;
class newaccountController extends Controller
{
    public static function home(){
        
        $roles = DB::select("Select * from roles");
        $user = DB::select("Select * from users");
        $questions = DB::select("Select * from questions");
        // dd($user);
        return view('/newuser', compact('user','roles','questions'));
    }
    public static function save(Request $request){
        $id     =   $request -> input('id');
        $request->validate([
            'password' => 'required',
            'password1' => 'required',
            'password2' => 'required|same:password1',
            'username' =>  ['required','min:8'],
            'question1' => 'required',
            'answer1' => 'required',
            'question2' => 'required',
            'answer2' => 'required',
        ]);
        $user   =   newaccountModel::user($id);
        //if password is correct
    if (Hash::check($request -> input('password'),$user[0]->password ))
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
                // dd('sadsa');
                toastr()->success('Account Updated Successfully!','NEW USER SETUP!');        
                return redirect('admin');
            }else{
                $data['image']  = $user[0]->image;
                $test = newaccountModel::securityquestion($data['id'],$data['question1'],$data['answer1'],$data['question2'],$data['answer2']);
                $test = newaccountModel::createnoimage($data['id'],$data['username'],$data['password'],$data['image']);
                toastr()->success('Account Updated Successfully!','NEW USER SETUP!');        
               return redirect('admin');
                }
        dd('wrong password');

        }
    else{
        dd('wrong password');
    }
}else{
    return redirect('/newuser')->with('wrongpass', 'Wrong Password!');
}
    }
}
