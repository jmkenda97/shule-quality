<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordEmail; // Make sure this points to the correct namespace
use App\Models\User;



class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check()){
         if(Auth::user()->user_type==1){
         return redirect('admin/dashboard');

        }else if(Auth::user()->user_type==2)
        {
           return redirect('teacher/dashboard');

        }else if(Auth::user()->user_type==3)
        {
            return redirect('student/dashboard');

        }else if(Auth::user()->user_type==4)
        {
           return redirect('parent/dashboard');

       }
    }
    
        return view('auth.login');
    }
    public function AuthLogin(Request $request)
    {  $remember = !empty($request->remember) ? true : false;
       if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember)){
        if(Auth::user()->user_type==1){
         return redirect('admin/dashboard');

        }else if(Auth::user()->user_type==2)
        {
           return redirect('teacher/dashboard');

        }else if(Auth::user()->user_type==3)
        {
            return redirect('student/dashboard');

        }else if(Auth::user()->user_type==4)
        {
           return redirect('parent/dashboard');

       
       }else{
           Auth::logout();
            return redirect()->back()->with('error', 'Unauthorized user type');
        }

    }


    return redirect()->back()->with('error', 'Invalid email or password');

    }

    public function forgotpassword()
    {
        return view('Auth.forgot');
    }

  
public function Postforgotpassword(Request $request)
{
  $user = User::getEmailSingle($request->email);

    if (!empty($user)) {
        $user->remember_token = Str::random(30);
        $user->save();

        Mail::to($user->email)->send(new ForgotPasswordEmail($user));

        return redirect()->back()->with('success', "Please check your email to reset password");
    } else {
        return redirect()->back()->with('error', "Email not found in the system");
    }
}
       
public function reset($remember_token){
    $user=User::getTokenSingle($remember_token);
    if(!empty($user)){
        $data['user']=$user;
       return view('auth.reset',$data);
    }else{
        abort(404);
    }
}

public function postreset($token,Request $request){
    if($request->password == $request->cpassword)
    {
        $user = User::getTokenSingle($token);
         $user->password= Hash::make($request->password);
        $user->remember_token = Str::random(30);
         $user->save();
        
         
       return redirect(url(''))->with('success', 'Password successfull reset');  
    }
    else
    {
    return redirect()->back()->with('error', "Password and Confirm Password does not match");

    }
}

public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
