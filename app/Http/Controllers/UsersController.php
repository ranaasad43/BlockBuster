<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class UsersController extends ViewsComposingController
{
    public function registerPage(){ 
    	$this->viewData['title'] = 'Registration Page';
    	return $this->buildTemplate('register');
    }

    public function register(Request $req){
    	//dd($req->all());
    	$rules = [
    		 'name' =>'min:3',
    		 'user_name' => 'min:5',
    		 'email' => 'email',
    		 'password' => 'required',
    		 'retype_password' => 'required|same:password',
    		 'dob' => 'date',
    		 'country' => 'required',    		 
    	];

    	$msgs = [
    		'name.min' => 'minimum three letters name'
    	];

    	$validator = Validator::make($req->all(),$rules,$msgs);
      //dd($validator->messages()->all());
      if(!empty($validator->messages()->all())){
				$this->viewData['message_class'] = 'red-text';
				$this->viewData['errors'] = $validator->messages()->all();
				$this->viewData['message'] = 'Errors! in the form';
				//dd($this->viewData);
       return $this->buildTemplate('register');
      }

      //dd('success');

      $user = new User;

			$user->name = $req->name;
			$user->user_name = $req->user_name;
			$user->email = $req->email;
			$user->password = $req->password;
			$user->gender = $req->gender;
			$user->dob = $req->birthday;
			$user->country = $req->country;

			if($user->save()){				
				$response = [];
				$response['message_class'] = 'green-text';				
				$response['status'] = 'User register Successfully';
				//dd($response);            
				return redirect('/')->with($response);
			}
    }

    public function LoginPage(){
    	return $this->buildTemplate('login');
    }

    public function UserLogin(Request $req){
    	//dd($req->all());
    	$rules = [
        'email' =>'email',
        'password' => 'required'
      ];

      $message = [];

      $validator = Validator::make($req->all(),$rules,$message);

      if(!empty($validator->messages()->all())){
        $this->viewData['errors'] = $validator->message()->all();
        return $this->buildTemplate('login');
      }

      $email = $req->get('email');
      $pass = $req->get('password');

      $params = array();

      $params['email'] = !empty($email) ? $email : '';
      $params['password'] = !empty($pass) ? $pass : '';

      $user = User::where($params)->first();
      //dd($user->name);
      if(!empty($user)){
      	session(['userData' => $user]);

      	return redirect('/')->with('Logged In');
      }
    }
}
