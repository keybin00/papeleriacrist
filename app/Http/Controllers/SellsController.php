<?php

namespace App\Http\Controllers;

use App\Sell;
use App\Storage;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SellsController extends Controller
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
    $answer     =['valid'=>true,'error'=>""];
    $products   = isset($_POST['list'])?$_POST['list']:false; //lista de productos a vender
    $total      = isset($_POST['total'])?$_POST['total']:false; //total
    
    if ($products && $total) {
      //datos recibidos
      //var_dump($list);

      $Sale = new Sale;
      $Sale->total = $total;
      $Sale->status = 'active';
      $Sale->save();

      foreach ($products as $product) {

        //Registrar venta
        $sale_product=new Sell;
        $sale_product->sale_id        = $Sale->id;
        $sale_product->clave_producto = $product["k"];
        $sale_product->cantidad       = $product["n"];
        $sale_product->subtotal       = $product["s"];
        $sale_product->save();

        //Actualizar inventario
        $s    = Storage::where('key_s', $product["k"])->first();
        $s->n = $s->n - $product["n"];
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
    $sales = Sale::orderBy('id', 'asc')->get();
    $index = 0;
    foreach ($sales as $sale) {
        $index = $index + 1;
        $aux = [];
        $actions = [];
        $aux[]    = $index;
        $aux[]    = $sale->total;
        $aux[]    = $sale->status;
        $actions[]  = "<a class='btn btn-sm btn-success btn-table' href='/sale/generateticket/".$sale->id."'><i class='fa fa-pencil-square-o'></i></a>";
        $aux[]    = join('',$actions); 
        $answer['data'][] = $aux;
    }
    echo json_encode($answer);
  }

}


