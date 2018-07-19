<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Session;
Use App\Models\User;

class LoginController extends Controller
{
    public function actionIndex(Request $request){
        if ($request->session()->exists('activeUser')) {
            return redirect('/');
        }else {
            return view('login.index');
        }
    }

    public  function actionLogin(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');
        $activeUser=User::where(['email'=>$email])->first();

        if(empty($activeUser->role)) {
            if($email == 'admin@gmail.com' && $password =='adminadmin'){
                $request->session()->put('activeUser', $email);
                return redirect('/');
            }else{
                echo "<div class='alert alert-danger'>email atau Password Salah!</div>";
                return view('login.index');
            }
        }
        else {
            if($activeUser->role==1){
                if($activeUser->password == sha1($password)){
                    $request->session()->put('activeUser', $activeUser);
                    return redirect('mentor-home');
                }else{
                    echo "<div class='alert alert-danger'>email atau Password Salah!</div>";
                    return view('login.index');
                }
            }
            else if ($activeUser->role==2) {
                if($activeUser->password == sha1($password)){
                    $request->session()->put('activeUser', $activeUser);
                    return redirect('user-home');
                }else{
                    echo "<div class='alert alert-danger'>email atau Password Salah!</div>";
                    return view('login.index');
                }
            }
        }
    }

    public function actionLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}