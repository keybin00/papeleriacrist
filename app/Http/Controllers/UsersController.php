<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UsersController extends Controller
{
   use RegistersUsers;
/*	flash('Message', 'info')
	flash('Message', 'success')
	flash('Message', 'danger')
	flash('Message', 'warning')
	flash()->overlay('Modal Message', 'Modal Title')
	flash('Message')->important()*/

	public function __construct()
	{
	    $this->middleware('auth');
	}


	public function new(){
		return view("users.new");
	}

	public function index(){
		return view("users.index");	
	}

	protected function validator(array $data)
	{
	    return Validator::make($data, [
	        'name' => 'required|max:255',
	        'lastname' => 'required|max:255',
	        'username' => 'required|max:255|unique:users',
	        'email' => 'required|email|max:255',
	    ]);
	}

	public function create(Request $request){
		$this->validate($request, [
        	'username' => 'required|unique:users'
        ]);
		$name 			= isset($_POST['name'])?$_POST['name']:false;
		$lastname 		= isset($_POST['lastname'])?$_POST['lastname']:false;
		$username 		= isset($_POST['username'])?$_POST['username']:false;
		$email 			= isset($_POST['email'])?$_POST['email']:false;
		$password 		= isset($_POST['password'])?$_POST['password']:false;
		$phone 			= isset($_POST['phone'])?$_POST['phone']:false;
		$role 			= isset($_POST['role'])?$_POST['role']:false;
		if ($name && $lastname && $username && $password && $phone && $role && $email) {
			$user = new User;
			$user->name 	= $name;
			$user->lastname = $lastname;
			$user->username = $username;
			$user->email    = $email;
			$user->password = bcrypt($password);
			$user->phone 	= $phone;
			$user->role 	= $role;
			if ($user->save()) {
				flash()->overlay('Usuario creado correctamente.', '¡Exito!');
			}else{
				flash('No se pudo guardar el nuevo registro.', 'danger');
			}
		}else{
			flash('Hacen falta parámetros requeridos para crear al nuevo Usuario.', 'danger');
		}
		return redirect("/users");
	}
}
