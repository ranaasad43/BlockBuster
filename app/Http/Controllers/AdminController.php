<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class AdminController extends ViewsComposingController
{
    public function login(){
    	$this->viewData['title'] = 'Admin Login';
    	return $this->buildTemplate('adminlogin');
    }

    public function adminPanel(Request $req){
    	//dd($req->all());
    	$rules = [
        'name' =>  'required',
        'email' =>'required|email',
        'password' => 'required'
      ];

      $message = [];

      $validator = Validator::make($req->all(),$rules,$message);

      if(!empty($validator->messages()->all())){
        $this->viewData['errors'] = $validator->message()->all();
        return $this->buildTemplate('adminlogin');
    	}

      $name = $req->name;
    	$email = 'admin@admin.com';
    	$pass = 'admin';

  	 $data = array();
  	 if($req->email != $email || $req->password != $pass ){
  	 		//dd('data not matched');
  	 		$this->viewData['message'] = 'Error .Try Again';
        return $this->buildTemplate('adminlogin');
  	 }else{
  	 	//dd('data matched');
  	 	$data['name'] = $name;
  	 	session(['admin' => $data]);
  	 	//dd(session()->get('admin'));
      return redirect()->route('admin');
  	 }
    }

    public function adminSection(){
    	$this->viewData['title'] = 'Admin page';
    	
    	return $this->buildTemplate('admin');
    }

    public function logout(){
      if(!empty(session()->get('userData')) || !empty(session()->get('admin'))){
        session()->flush();
        }

      return redirect('/');
    }
}
