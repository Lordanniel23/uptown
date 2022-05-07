<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
Use App\models\passwordModel;
use Hash;
use Session;

class passwordController extends Controller
{
    public static function index()
    {
        $roles = DB::select("Select * from roles");
        $questions = DB::select("Select * from questions");
        $user = DB::select("Select * from users");

        return view('/forgotpassword',compact('roles','user','questions'));
    }
    // public static function check(Request $request){
    //     $data['username']       =   $request -> input('username');
    //     $data['question1']      =   $request -> input('question1');
    //     $data['answer1']        =   $request -> input('answer1');
    //     $data['question2']      =   $request -> input('question2');
    //     $data['answer2']        =   $request -> input('answer2'); 
    //     dd($data);
    //     $test = passwordModel::checkuser($data['username'],$data['question1'],$data['answer1'],$data['question2'],$data['answer2']);
    //     $test = passwordModel::checkquestions($data['username'],$data['question1'],$data['answer1'],$data['question2'],$data['answer2']);
    //     return view('/verifyquestion/{id}',compact('test','questions'));
    //     }

        public static function question1(Request $request){
            $q1=$request->q1;
            $q1 = DB::select("Select * from questions where id != '$q1'");
            return $q1;
          }
        public static function question2(Request $request){
            $q2=$request->q2;
            $q2 = DB::select("Select * from questions where id != '$q2'");
            return $q2;
        }
        public static function verify(Request $request){
            $request->validate([
                'username' => 'required|exists:users,username',
                'question1' => 'required',
                'answer1' => 'required',
                'question2' => 'required',
                'answer2' => 'required',
            ]);
            $data['username']       =   $request -> input('username');
            $data['question1']      =   $request -> input('question1');
            $data['answer1']        =   $request -> input('answer1');
            $data['question2']      =   $request -> input('question2');
            $data['answer2']        =   $request -> input('answer2'); 
            // dd($data);
            $id = passwordModel::checkuserid($data['username']);
            if (count($id) != 0) {
            $ids = $id[0]->id;
            $securities = DB::select("SELECT * FROM answers where id = $ids ;");
            $users = DB::select("SELECT * FROM users where id = $ids ;");
            $user = $users[0];
            // dd($user);
            $answers = $securities[0];

                if ($answers->q_one == $data['question1'] && $answers->q_two == $data['question2']) {
                    // dd('tama question 1 and 2');
                    if (Hash::check($data['answer1'],$answers->q_one_answer) & Hash::check($data['answer2'],$answers->q_two_answer )){
                        Session::put('ids', $ids);
                        // dd(Session::get('ids'));
                        toastr()->success('Change to new password','ACCOUNT FOUND!');
                        return redirect('/changepassword');
                        // dd('tama answer 1 and 2 ');
                    }
                    else{
                        toastr()->error('Wrong security questions/answers!','ERROR');
                        return redirect('/forgotpassword');

                        // dd('wrong answer 1 and 2 ');
                    }
                }
                else{
                    toastr()->error('Wrong security questions/answers!','ERROR');
                    return redirect('/forgotpassword');

                    // dd('wrong security questions');
                }
            }else{

            // return redirect('/forgotpassword')->with($notification);
            }
            dd('end');            
            // return view('/verifyquestion/{id}',compact('test','questions'));
            }
            public function changepass(){
                // $request->validate([
                //     'password' => 'required|min:6|confirmed'
                // ]);
    
                // // $data['password'] = Hash::make($password1);
                $users = DB::select("SELECT * FROM users");
                return view('/changepassword',compact('users'));
            }
            public static function checkchangepass(Request $request){
                $request->validate([
                    'password' => 'required|min:8|confirmed',
                    'password_confirmation' => 'required|min:8'
                ]);    
            $id             =   $request -> input('id');
            $password       =   $request -> input('password');

                $newpassword = Hash::make($password);
                toastr()->success('Password Updated Successfully!','Success');
            $updatepassword = DB::update("update users set password = '$newpassword' where id = $id ");
            return redirect('/')->with('message', 'Password Successfully Changed!');
            }
}
