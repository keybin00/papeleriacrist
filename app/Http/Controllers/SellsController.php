<?php

namespace App\Http\Controllers;

use App\Sell;
use App\Storage;
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


}
