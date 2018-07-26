<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Contain;
use Session;
class LoginController extends Controller
{
    //

    public function index(){
                                $contains_model= new Contain();
                         $result=$contains_model->count($user);
                        $c=count($result);
                    Session::put('basketcount',$c);
    	return view('register');
    }

    public function authenticate(Request $request){
    	$username=$request->input('username');
    	$password=$request->input('password');
		$users=Customer::where('username',$username)->get();
		foreach ($users as $user){
			$uname=$user->username;
			$pwd=$user->password;
		}
		 if($users)
		 {
		 	if($password==$pwd){
		 		Session::put('loginuser',$uname);
                $contains_model= new Contain();
                $result=$contains_model->count($uname);
                $c=count($result);
                Session::put('basketcount',$c);
		 		return redirect('/search');
		 	}
		 	else{
		 		return "invalid password";
		 	}
		 	
		 }
		 else{
		 	return "invalid username";

		 }
		 return "DB error";

    }


    public function registering(Request $request){
    	$username=$request->input('username');
    	$password=$request->input('pwd');
    	$cpassword=$request->input('cpwd');
    	$email=$request->input('email');
    	$phonenumber=$request->input('phonenumber');
    	$address=$request->input('address');
    	if($password==$cpassword){
    		 $result=Customer::insert([
    		['username'=>$username,
    		  'address'=>$address,
    		  'email'=>$email,
    		  'phone'=>$phonenumber,
    		  'password'=>$password]

    		]);
    		if($result!=0){
    			return view('customer');
    		}
    		else
    		{
    			return 'unable to register please try again';
    		}

    }
    else{
    	return 'password and confirm password doesnt match';
    }
    }



    public function logout(){
        Session::flush();
        return redirect('/');
    }
        public function search(){
        
        return view('search');
    }
}
