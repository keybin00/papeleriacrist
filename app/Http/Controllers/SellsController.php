<?php

namespace App\Http\Controllers;

use App;
use App\Sell;
use App\Storage;
use App\Salesproducts;
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
    $answer=['valid'=>true,'error'=>"",'k'=>"",'p'=>0,'n'=>0,'s'=>0,"d"=>"",'id'=>0];
    $k 		= isset($_POST['key'])?$_POST['key']:false;
    $n 		= isset($_POST['num'])?$_POST['num']:false;
    $product = Storage::where('key_s', $k)->first();
    if ($product) {
      if($n <= $product->n){
        $answer['k']=$k;
				$answer['d']=$product->description;
        $answer['id'] = $product->id;
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
    $answer     =['valid'=>true,'error'=>"",'saleID'=>"0"];
    $products   = isset($_POST['list'])?$_POST['list']:false; //lista de productos a vender
    $total      = isset($_POST['total'])?$_POST['total']:false; //total
     if ($products && $total) {
      $sale = new Sell;
      $sale->total = $total;
      if ($sale->save()) {
        foreach ($products as $product) {
          $s    = Storage::find($product['id']);
          if ($s) {
            $s->n = $s->n - $product["n"];
            if ($s->save()) {
              $relationRow = new Salesproducts;
              $relationRow->sale                =$sale->id;
              $relationRow->product             =$product['id'];
              $relationRow->product_price       =$product['p'];
              if ($relationRow->save()) {
                $answer['valid']=true;
                $answer["saleID"]=$sale->id;
                $answer['error']="";
              }else{
                $answer['valid']=false;
                $answer['error']="Error al guardar relaciones.";
              }
            }else{
              $answer['valid']=false;
              $answer['error']="Error al descontar los productos vendidos del inventario.";
            }
          }else{
            $answer['valid']=false;
            $answer['error']="Error al descontar los productos vendidos del inventario.";
          }
        }
      }else{
        $answer['valid']=false;
        $answer['error']="Error al registrar la venta";
      }
     }else{
        $answer['valid']=false;
        $answer['error']="datos no recibidos";
     }
     echo json_encode($answer);
  }


  public function generateTicket($id){
      $sale = Sell::find($id);
      $products = Salesproducts::where('sale',$sale->id)
                                ->orderBy('id', 'asc')
                                ->get();
      $names = [];
      if ($sale && $products){
        foreach ($products as $p) {
          echo var_dump($p->product);
          $item = Storage::find($p->product);
          if ($item) {
            echo var_dump($item->description);
            if (!isset($names[$item->id])) {
              $names[$item->id] = $item->description; 
            }
          }
        }
        return ["sale"=>$sale,"products"=>$products,"names"=>$names];  
      }else{
        flash("Hubo un error al tratar de generar el recibo.",'danger');
        return redirect("/sells/seller");
      }                        
  }

  public function getRecipe(){
    $id = $_GET['id'];
    if ($id) {
      $values = $this->generateTicket($id);  
      $pdf = App::make('dompdf.wrapper');
      $pdf->loadView('sells.ticket',$values);
      return $pdf->stream('Recibo_Venta_.pdf');
    }else{
      flash("No se encontró la venta.",'danger');
      return redirect("/sells/seller");
    }
  }

  public function downloadRecipe($id){
    if ($id) {
      $values = $this->generateTicket($id);  
      $pdf = App::make('dompdf.wrapper');
      $pdf->loadView('sells.ticket',$values);
      return $pdf->download('Recibo_Venta_'.$id.'.pdf');;
    }else{
      flash("No se encontró la venta.",'danger');
      return redirect("/sells");
    }
  }

  public function gettable(){
    $answer = [
      'data'=>[]
    ];
    $sales = Sell::orderBy('id', 'asc')->get();
    $index = 0;
    foreach ($sales as $sale) {
        $index = $index + 1;
        $aux = [];
        $actions = [];
        $aux[]    = $index;
        setlocale(LC_MONETARY, 'en_US');
        $aux[] = '$'.money_format('%(#10n', $sale->total).' M.N.';
        $actions[]  = "<a title='Ver recibo' target='_blank' class='btn btn-sm btn-danger btn-table' href='/sells/recipe?id=".$sale->id."'><i class='fa fa-file-pdf-o'></i></a>";
        $actions[]  = "<a title='Ver recibo' target='_blank' class='btn btn-sm btn-info btn-table' href='/sells/downloadrecipe/".$sale->id."'><i class='fa fa-cloud-download'></i></a>";
        $aux[]    = join('',$actions); 
        $answer['data'][] = $aux;
    }
    echo json_encode($answer);
  }

}


