<?php

namespace App\Http\Controllers;

use App\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StorageController extends Controller
{
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
		return view("storage.new");
	}

	public function index(){
		return view("storage.index");
	}

	protected function validator(array $data)
	{
	    return Validator::make($data, [
	        'name' => 'required|max:255',
	        'lastname' => 'required|max:255',
	        'username' => 'required|max:255|unique:storage',
	        'email' => 'required|email|max:255',
	    ]);
	}

	public function create(Request $request){


		$key_s 			= isset($_POST['key_s'])?$_POST['key_s']:false;
		$description 		= isset($_POST['description'])?$_POST['description']:false;
		$n 		= isset($_POST['n'])?$_POST['n']:false;
		$n_limit 			= isset($_POST['n_limit'])?$_POST['n_limit']:false;
		$price 		= isset($_POST['price'])?$_POST['price']:false;

    if ($key_s && $description && $n && $n_limit && $price) {
			$s = new Storage;
			$s->key_s 	= $key_s;
			$s->description = $description;
			$s->n = $n;
			$s->n_limit    = $n_limit;
      $s->price    = $price;

      if ($s->save()) {
				flash()->overlay('producto creado correctamente.', '¡Exito!');
			}else{
				flash('No se pudo guardar el nuevo registro.', 'danger');
			}
		}else{
			flash('Hacen falta parámetros requeridos para crear al nuevo producto.', 'danger');
		}
		return redirect("/storage");
	}

	public function getstorage(){
		$answer = [
			'data'=>[]
		];
		$storage = Storage::orderBy('id', 'asc')
		               ->get();
		foreach ($storage as $s) {
		    $actions = [];
		    $aux = [];
		    $aux[] 		= $s->id;
		    $aux[] 		= $s->key_s;
		    $aux[] 		= $s->description;
        $aux[] 		= "$".$s->price;
		    $aux[] 		= $s->n;
		    $aux[] 		= $s->n_limit;

		    $actions[] 	= "<a class='btn btn-sm btn-success btn-table' href='/storage/edit/".$s->id."'><i class='fa fa-pencil-square-o'></i></a>";
		    $actions[] 	= "<a class='btn btn-sm btn-primary btn-table' href='/storage/delete/".$s->id."'><i class='fa fa-trash'></i></a>";
		    $aux[] 		= join('',$actions);
		    $answer['data'][] = $aux;
		}
		echo json_encode($answer);
	}

	public function edit($id){
		if ($id) {
			$s = Storage::find($id);
			if ($s) {
				return view("storage.edit",['s'=>$s]);
			}else{
				flash('No se encontró el registro del producto que se quiere editar.', 'danger');
				return redirect("/storage");
			}
		}else{
			flash('No se encontró el registro del producto que se quiere editar.', 'danger');
			return redirect("/storage");
		}
	}

	public function update($id){
		if ($id) {
			$s = Storage::find($id);
			if ($s) {
        $key_s 			= isset($_POST['key_s'])?$_POST['key_s']:false;
    		$description 		= isset($_POST['description'])?$_POST['description']:false;
    		$n 		= isset($_POST['n'])?$_POST['n']:false;
    		$n_limit 			= isset($_POST['n_limit'])?$_POST['n_limit']:false;
    		$price 		= isset($_POST['price'])?$_POST['price']:false;


				if ($key_s && $description && $n && $n_limit && $price) {
          $s->key_s 	= $key_s;
    			$s->description = $description;
    			$s->n = $n;
    			$s->n_limit    = $n_limit;
          $s->price    = $price;


					if ($s->save()) {
						flash()->overlay('producto actualizado correctamente.', '¡Exito!');
						return redirect("/storage");
					}else{
						flash('No se pudo guardar el nuevo registro.', 'danger');
						return redirect("/storage");
					}
				}else{
					flash('Hacen falta parámetros requeridos para crear al nuevo producto.', 'danger');
					return redirect("/storage");
				}
			}else{
				flash('No se encontró el registro del producto que se quiere actualizar.', 'danger');
				return redirect("/storage");
			}
		}else{
			flash('No se encontró el registro del producto que se quiere actualizar.', 'danger');
			return redirect("/storage");
		}
	}

	public function delete($id){
		if ($id) {
			$s = Storage::find($id);
			if ($s) {
				if ($s->delete()) {
					flash()->overlay('producto eliminado correctamente.', '¡Exito!');
					return redirect("/storage");
				}else{
					flash('No se pudieron guardar los cámbios realizados al producto.', 'danger');
					return redirect("/storage");
				}
			}else{
				flash('No se encontró el registro del producto que se quiere eliminar.', 'danger');
				return redirect("/storage");
			}
		}else{
			flash('No se encontró el registro del producto que se quiere eliminar.', 'danger');
			return redirect("/storage");
		}
	}
}
