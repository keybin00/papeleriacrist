<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	public function new(){
		return view("users.new");
	}

	public function create(Request $request){
		// echo "<pre>";
		// echo var_dump($_POST);
		// echo "</pre>";
		$validLength = 8;//valid number of params
		$message = false;
		//all params
		$name 			= isset($_POST['name'])?$_POST['name']:false;
		$lastname 		= isset($_POST['lastname'])?$_POST['lastname']:false;
		$username 		= isset($_POST['username'])?$_POST['username']:false;
		$email 			= isset($_POST['email'])?$_POST['email']:false;
		$password 		= isset($_POST['password'])?$_POST['password']:false;
		$phone 			= isset($_POST['phone'])?$_POST['phone']:false;
		$role 			= isset($_POST['role'])?$_POST['role']:false;
		if ($name && $lastname && $username && $password && $phone && $role && $email) {
			if(count($_POST) === 8){
				$user = new User;
				$user->name 	= $name;
				$user->lastname = $lastname;
				$user->username = $username;
				$user->email    = $email;
				$user->password = $password;
				$user->phone 	= $phone;
				$user->role 	= $role;
				$userFound = User::where('username',$username) -> first();
				$userMail = User::where('email',$email) -> first();
				if($userFound || $userMail){
					$message = "Error, ya existe un usuario con el username ".$username." o con el email ".$email;
					// $this->index($message);	
				}else{
					if ($user->save()) {
						$message = "Exito, Usuario creado correctamente.";
						// $this->index($message);	
					}else{
						$message = "Error, se ha generado un error al tratar de crear un registro";
						// $this->index($message);	
					}	
				}
			}else{
				$message = "Error, se han detectado parámetros adicionales a los requeridos.";
				// $this->index($message);
			}
		}else{
			$message = "Error, falta algún parámetro";
			// $this->index($message);
		}
		return view("users.index",["msg"=>$message]);
	}

	public function index($msg = false){
		return view("users.index",["msg"=>$msg]);
	}
}
