<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Using Model
 */
use App\Models\Admin\Admin;

class AdminController extends Controller{
    public function __construct(){
        //$this->middleware('admin');
   	}

   	public function index(){
        return view('admin.dashboard');
    }

    public function getLogin(){
    	return view('admin.login');
    }
    public function postLogin(Request $request){
    	//dd($request->all());
    	$validator = validator($request->all(), [
			'email'    => 'required|email|max:255',
			'password' => 'required|min:6',
    	]);
    	if($validator->fails()){
    		return redirect('/admin/login')
    				->withErrors($validator)
    				->withInput();
    	}
    	$data = ['email' => $request->get('email'), 'password' => $request->get('password')];
    	if(auth()->guard('admin')->attempt($data)){
    		return redirect('/admin');
    	}else{
    		return redirect('/admin/login')
    			->withErrors(['errors' => 'Login invalid'])
    			->withInput();
    	}
    }

    public function getRegistration(){
    	return view('admin.auth.register');
    }
    public function postRegistration(Request $request){
        //dd($request->all());
        $validator = validator($request->all(), [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:admins',
            'password' => 'required|confirmed|min:6',
        ]);
        if($validator->fails()){
            return redirect('/admin/register')
                    ->withErrors($validator)
                    ->withInput();
        }

        if(auth()->guard('admin')->login($this->create($request->all()))){
            return redirect('/admin');
        }else{
            return redirect('/admin/register')
                ->withErrors(['errors' => 'Register invalid'])
                ->withInput();
        }

    }

    public function create(array $data){
        return Admin::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function logout(){
    	auth()->guard('admin')->logout();
    	return redirect('/admin/login');
    }
}
