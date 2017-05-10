<?php

namespace App\Http\Controllers;

use App\Sell;
use App\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SellsController extends Controller
{
/*
  flash('Message', 'info')
	flash('Message', 'success')
	flash('Message', 'danger')
	flash('Message', 'warning')
	flash()->overlay('Modal Message', 'Modal Title')
	flash('Message')->important()
*/

	public function __construct(){
	    $this->middleware('auth');
	}

  public function index(){
    return view("sells.index");
  }

	public function seller(){
		return view("sells.new");
	}

  public function searcher(){
    $answer=['valid'=>true,'error'=>"",'k'=>"",'p'=>0,'n'=>0,'s'=>0,"d"=>""];
    $k 		= isset($_POST['key'])?$_POST['key']:false;
    $n 		= isset($_POST['num'])?$_POST['num']:false;
    $product = Storage::where('key_s', $k)->first();
    if ($product) {
      if($n <= $product->n){
        $answer['k']=$k;
				$answer['d']=$product->description;
        $answer['p']=floatval($product->price);
        $answer['n']=floatval($n);
        $answer['s']=$answer['p'] * $answer['n'];
      }else{
        $answer['valid']=false;
        $answer['error']="No hay stock suficiente";
      }
    }else{
      $answer['valid']=false;
      $answer['error']="Producto no encontrado";
    }
      echo json_encode($answer);
	}

  public function sellRegister(){
    $answer=['valid'=>true,'error'=>""];
    $list    = isset($_POST['list'])?$_POST['list']:false; //lista de productos a vender
    $t    = isset($_POST['total'])?$_POST['total']:false; //total
    if ($list && $t) {
      //datos recibidos
      //var_dump($list);
      foreach ($list as $p ) {
        //Registrar venta
        $v=new Sell;
        $v->clave_producto=$p["k"];
        $v->cantidad=$p["n"];
        $v->subtotal=$p["s"];
        $v->save();
        //Actualizar inventario
        $s = Storage::where('key_s', $p["k"])->first();
        $s->n= $s->n - $p["n"];
        $s->save();
      }
      $answer['valid']=true;
      $answer['error']="";
    }else{
      $answer['valid']=false;
      $answer['error']="datos no recibidos";
    }
    echo json_encode($answer);
  }

  public function getRecipe(){
    $list    = isset($_GET['list'])?$_GET['list']:false; //lista de productos a vender
    $t    = isset($_GET['total'])?$_GET['total']:false; //total


    $list= json_decode($list);
    if($list && $t){
      var_dump($list);
      var_dump($t);
    }else{
      echo "No data";
    }
  }

  public function gettable(){
    $answer = [
      'data'=>[]
    ];
    $sells = Sell::orderBy('id', 'asc')->get();
    foreach ($sells as $s) {
        $aux = [];
        $aux[]    = $s->id;
        $aux[]    = $s->clave_producto;
        $aux[]    = $s->cantidad;
        $aux[]    = "$".$s->subtotal;
        $answer['data'][] = $aux;
    }
    echo json_encode($answer);
  }
 //final de controller 
}
