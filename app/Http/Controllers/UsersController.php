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


	public function new1(){
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
			$user->status 	= 'active';
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

	public function getusers(){
		$answer = [
			'data'=>[]
		];
		$users = User::where('status', 'active')
		               ->orderBy('id', 'asc')
		               ->get();
		foreach ($users as $user) {
		    $actions = [];
		    $aux = [];
		    $aux[] 		= $user->id;
		    $aux[] 		= $user->name;
		    $aux[] 		= $user->lastname;
		    $aux[] 		= $user->email;
		    $aux[] 		= $user->phone;
		    $aux[] 		= $user->username;
		    $aux[] 		= $user->role==='admin'?'Administrador':'Usuario';
		    $actions[] 	= "<a class='btn btn-sm btn-success btn-table' href='/users/edit/".$user->id."'><i class='fa fa-pencil-square-o'></i></a>";
		    $actions[] 	= "<a class='btn btn-sm btn-primary btn-table' href='/users/delete/".$user->id."'><i class='fa fa-trash'></i></a>";
		    $aux[] 		= join('',$actions); 
		    $answer['data'][] = $aux;
		}
		echo json_encode($answer);
	}

	public function edit($id){
		if ($id) {
			$user = User::find($id);
			if ($user) {
				return view("users.edit",['user'=>$user]);	
			}else{
				flash('No se encontró el registro del usuario que se quiere editar.', 'danger');
				return redirect("/users");	
			}
		}else{
			flash('No se encontró el registro del usuario que se quiere editar.', 'danger');
			return redirect("/users");
		}
	}

	public function update($id){
		if ($id) {
			$user = User::find($id);
			if ($user) {
				$name 			= isset($_POST['name'])?$_POST['name']:false;
				$lastname 		= isset($_POST['lastname'])?$_POST['lastname']:false;
				$username 		= isset($_POST['username'])?$_POST['username']:false;
				$email 			= isset($_POST['email'])?$_POST['email']:false;
				$phone 			= isset($_POST['phone'])?$_POST['phone']:false;
				$role 			= isset($_POST['role'])?$_POST['role']:false;
				if ($name && $lastname && $username && $phone && $role && $email) {
					$user->name 	= $name;
					$user->lastname = $lastname;
					$user->username = $username;
					$user->email    = $email;
					$user->phone 	= $phone;
					$user->role 	= $role;
					$user->status 	= 'active';
					if ($user->save()) {
						flash()->overlay('Usuario actualizado correctamente.', '¡Exito!');
						return redirect("/users");	
					}else{
						flash('No se pudo guardar el nuevo registro.', 'danger');
						return redirect("/users");	
					}
				}else{
					flash('Hacen falta parámetros requeridos para crear al nuevo Usuario.', 'danger');
					return redirect("/users");	
				}
			}else{
				flash('No se encontró el registro del usuario que se quiere actualizar.', 'danger');
				return redirect("/users");	
			}
		}else{
			flash('No se encontró el registro del usuario que se quiere actualizar.', 'danger');
			return redirect("/users");
		}
	}

	public function delete($id){
		if ($id) {
			$user = User::find($id);
			if ($user) {
				$user->status = 'deleted';
				if ($user->save()) {
					flash()->overlay('Usuario eliminado correctamente.', '¡Exito!');
					return redirect("/users");
				}else{
					flash('No se pudieron guardar los cámbios realizados al usuario.', 'danger');
					return redirect("/users");		
				}
			}else{
				flash('No se encontró el registro del usuario que se quiere eliminar.', 'danger');
				return redirect("/users");	
			}
		}else{
			flash('No se encontró el registro del usuario que se quiere eliminar.', 'danger');
			return redirect("/users");
		}
	}
}
