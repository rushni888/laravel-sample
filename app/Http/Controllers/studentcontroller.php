<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\student_list;
use DB;
class studentcontroller extends Controller
{
    public function newaccount(Request $request){
    	#validation rule
        // $this->validate($request, [
        //     'name' => 'required|regex:/^[a-zA-Z]+$/u', //only letteres allowed
        //     'place' => 'required',
        //     'address' => 'required|min:7',
        //     //'name.required' => 'A title is required',
        //    // 'password' => 'required',
        // ]);

        $this->validate(
        $request, 
        [   
            'name'  => 'required|regex:/^[a-zA-Z]+$/u',
            'place' => 'required',
            'contact' => 'required|min:10|max:13',
            'address'   => 'required|min:10',
            'course'   => 'required' ,
            'profile'   => 'required|max:1999|image' , //under 2 mega bytes
            'username'   => 'required' ,
            'password' => 'min:6|required_with:cpass|same:cpass',
        ],
        [   
            'name.required'    => 'Enter Your Name',
            'name.regex'      => 'Please Enter A Valied Name',
            'place.required'      => 'Enter Your Place',
            //'contact.min'      => 'Contact IS Minimum 10 Numberes',
            //'contact.max'      => 'Contact IS MAximum 13 Numberes',
            'contact.required'      => 'Enter Your Contact',
            'address.required'      => 'Enter Your Address',
            'address.min'      => 'Address is Minimum 10 Characters Required',
            'course.required'      => 'Select Your Course',
            'profile.required'      => 'Upload Profile',
            'username.required'      => 'Enter Username',
            'password.required'      => 'Enter Password',
            'password.same'      => 'Password Missmatching',
            'password.min'      => 'Minimum Length Of Password is 6',
        ]
    );
        #/validatopn rule
        #insert
        $student = new student_list([
        	'name' => $request->get('name'),
        	'place' => $request->get('place'),
        	'contact' => $request->get('contact'),
        	'address' => $request->get('address'),
        	'course' => $request->get('course'),
        	'image' => "fileName".time().'.'.$request->file('profile')->getClientOriginalExtension(),
        	'username' => $request->get('username'),
        	'password' => $request->get('password')
        ]);
        //get file name
       $fileName = "fileName".time().'.'.request()->profile->getClientOriginalExtension();
     	//upload image
       $path = $request->file('profile')->storeAs('public/profile',$fileName);
       $student->save();   //save insert query
       return redirect('newstd')->with('Message', 'Registered!');
        #//insert
    }
    public function stdlogin(Request $request){
    	#validation rule
        $this->validate($request, [
            'user' => 'required',
            'password' => 'required',
        ]);
        #/validatopn rule
         #login
        $uname=$request->input('user');
        $pwd=$request->input('password');
        $std=DB::table('student_lists')
        ->where('username',$uname)
        ->first();
        if(is_null($std)){
        	//echo "Incorrect Username";
        	//return view('admin');
        	return redirect('studentlogin')->with('errorMessage', 'Incorrect Username!');
        }
        elseif (($uname==$std->username)&&($pwd==$std->password)) {
        	//echo "Login Success";
        	$request->session()->put('userid',$std->id);
        	//return view('student.stdhome');
            return redirect('stdhome');
        }
        else{
        	//echo "Incorrect Password";
        	//return view('admin');
        	return redirect('studentlogin')->with('errorMessage', 'Incorrect Password!');
        }
       // var_dump($admin);
        #/login
    }
    public function studenthome(){
            //check session set
        if (session()->has('userid')) {
            $value =session()->get('userid');
            $students = DB::table('student_lists')->where('id', $value)->first();
            return view('student.stdhome', ['student' => $students]);
            }
            else{
                echo "please Login Account";
                
            }
    }
    public function stdlogout(){
        session()->forget('userid');
        session()->flush();
        return view('welcome');
    }
    public function updateprofile($id){
        $students = DB::table('student_lists')->where('id', $id)->first();
        return view('student.profileupdate', ['student' => $students]);
    }
    public function updatestudentprofile(Request $request ,$id){
        //echo $id;
        $name=$request->input('name');
        $place=$request->input('place');
        $contact=$request->input('contact');
        $address=$request->input('address');
        $course=$request->input('course');
        $fileName = "fileName".time().'.'.request()->image->getClientOriginalExtension();
        //upload image
        $path = $request->file('image')->storeAs('public/profile',$fileName);
        DB::table('student_lists')
            ->where('id', $id)
            ->update(['name' => $name,'place' => $place,'contact' => $contact, 'address' =>$address,'course'=>$course,'image'=>$fileName]);
        //echo $name;
        return view('student.stdhome'); 
    }
   
}
