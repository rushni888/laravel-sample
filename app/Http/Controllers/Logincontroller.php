<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class Logincontroller extends Controller
{                                                                                                                                                                                                                                                                                                                                                                                                                                                     +
    public function adminlogin(Request $request){
#validation rule
        $this->validate($request, [
            'user' => 'required',
            'password' => 'required',
        ]);
        #/validatopn rule
         #login
        $uname=$request->input('user');
        $pwd=$request->input('password');
        $admin=DB::table('admin_logins')
        ->where('username',$uname)
        ->first();
        if(is_null($admin)){
        	//echo "Incorrect Username";
        	//return view('admin');
        	return redirect('admin')->with('errorMessage', 'Incorrect Username!');
        }
        elseif (($uname==$admin->username)&&($pwd==$admin->password)) {
        	//echo "Login Success";
            //return view('admin_home');
            //set session
            $request->session()->put('adminid',$admin->id);
            return redirect('stdview');
        }
        else{
        	//echo "Incorrect Password";
        	//return view('admin');
        	return redirect('admin')->with('errorMessage', 'Incorrect Password!');
        }
       // var_dump($admin);
        #/login
    }
}
