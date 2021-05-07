<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student_list;
use DB;
class admin extends Controller
{
    public function viewstudent(){
    	//check session set
    	if (session()->has('adminid')) {
    		
    		//display all datas
       //$students = student_list::all()->toArray();
       //return view('admin.admin_home',compact('students'));
    	$students = DB::table('student_lists')->get();
        return view('admin.admin_home', ['student' => $students]);
    }
    else{
    	echo "please Login Account";
    	
    }
    }

    public function logoutadmin(){
    	session()->forget('adminid');
		session()->flush();
		return view('welcome');
    }
    public function adminserch(Request $request){
    	$sropt=$request->input('search');
    	//echo $sropt;
    	$students = DB::table('student_lists')
    	->where('name', $sropt)
    	->orwhere('place', $sropt)
    	->orwhere('contact', $sropt)
    	->get();
    	return view('admin.admin_home', ['student' => $students]);
    }
    public function deleteac($id){
    	DB::table('student_lists')->where('id', $id)->delete();
    	return redirect('stdview');
    }
}
