<?php

namespace App\Http\Controllers;
use App\PDF;
use App;
use DateTime;
use DateInterval;
use App\Rent;
use App\Device;
use Illuminate\Http\Request;

class RentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('rents.index');
    }

    public function getrents(){
        $answer = [
            'data'=>[]
        ];
        $rents = Rent::where('status', 'active')
                       ->orderBy('id', 'asc')
                       ->get();
        foreach ($rents as $rent) {
            $actions = [];
            $aux = [];
            $aux[]              = $rent->id;
            $device             = Device::find($rent->equipment);
            $aux[]              = $device->name;
            $startDate          = date_create($rent->started);
            $endedDate          = date_create($rent->ended);
            $stimatedDate       = date_create($rent->stimated);
            $aux[]              = date_format($startDate, 'Y-m-d H:i:s');
            $aux[]              = date_format($endedDate, 'Y-m-d H:i:s');
            $aux[]              = date_format($stimatedDate, 'Y-m-d H:i:s');
            $aux[]              = $rent->anticipated ? '<span class="label label-danger">Sí</span>' : '<span class="label label-info">No</span>';
            $aux[]              = $rent->is_complete ? $this->getHoursBetweenDates($rent->started, $rent->ended).' Horas '.$this->getMinutesBetweenDates($rent->started,$rent->ended).' minutos' : '<span class="label label-info">Activa</span>';
            if ($rent->is_complete) {
                $actions[]          = "<a target='_blank' title='Ver Recibo' class='btn btn-sm btn-danger btn-table' href='/rents/ticket/".$rent->id."'><i class='fa fa-file-pdf-o'></i></a>";
                $actions[]          = "<a title='Descargar Recibo' class='btn btn-sm btn-info btn-table' href='/rents/downloadticket/".$rent->id."'><i class='fa fa-cloud-download'></i></a>";
            }else{
                $actions[]          = "<a disabled='disable' target='_blank' title='Ver Recibo' class='btn btn-sm btn-danger btn-table not-active' href='#'><i class='fa fa-file-pdf-o'></i></a>";
                $actions[]          = "<a disabled='disabled' title='Descargar Recibo' class='btn btn-sm btn-info btn-table not-active' href='#'><i class='fa fa-cloud-download'></i></a>";
            }
            /*$actions[]          = "<a class='btn btn-sm btn-primary btn-table' href='/rents/delete/".$rent->id."'><i class='fa fa-trash'></i></a>";*/
            $aux[]              = join('',$actions); 
            $answer['data'][]   = $aux;
        }
        echo json_encode($answer);
    }

    public function getHoursBetweenDates($sd,$ed){
        $date1 = $sd;
        $date2 = $ed;
        $diff = strtotime($date2) - strtotime($date1);
        $diff_in_hrs = round($diff/3600);
        return $diff_in_hrs;
    }

    public function getMinutesBetweenDates($sd,$ed){
        $from_time = strtotime($sd);
        $to_time = strtotime($ed);
        return round(abs($to_time - $from_time) / 60);
    }

    public function create($id){
        if ($id) {
            date_default_timezone_set('America/Cancun');
            $hours = $_POST['hours'];
            $minutes = $_POST['minutes'];
            if ( ($hours === '0' && $minutes === '0') || ($hours === 0 && $minutes === 0) ){
                flash('Error, el valor mínimo es 1 minuto para que se pueda generar una renta.', 'danger');
                return redirect("/devices");
            }
            $currentDateTime    = date("Y-m-d H:i:s"); 
            $device = Device::find($id);
            if ($device) {
                if (!$device->rented) {
                    $rent               = new Rent;
                    $rent->is_complete  = false;
                    $rent->status       = 'active';
                    $currentDateTime    = date("Y-m-d H:i:s"); 
                    $now = new DateTime(); //current date/time
                    $now->add(new DateInterval("PT{$hours}H"));
                    $now->add(new DateInterval("PT{$minutes}M"));
                    $new_time = $now->format('Y-m-d H:i:s');
                    $rent->started          = $currentDateTime;
                    $rent->ended            = date('Y-m-d 00:00:00');
                    $rent->stimated         = $new_time;
                    $rent->equipment        = $id;
                    $rent->device_minimum   = $device->minimum;
                    $rent->device_rate      = $device->rate;
                    if ($rent->save()) {
                        $device->rented = true;
                        if ($device->save()) {
                            flash('Equipo rentado correctamente.', 'info');
                        }else{
                            flash('Hubo un error al tratar de rentar el equipo.', 'danger');
                        }
                    }else{
                        flash('Hubo un error al tratar capturar la renta.', 'danger');
                    }
                }else{
                    flash('El dispositivo se encuentra actualmente rentado.', 'danger');
                }
            }else{
                flash('No se encontró el dispositivo que se quiere rentar.', 'danger');
            }    
        }else{
            flash('Faltan parámetros para realizar la renta.', 'danger');
        }            
        return redirect("/devices");
    }

    public function closerent(){
        $answer = [
            'success' => false,
            'callbackScript' =>'showToast("¡Error!","Hubo un error al tratar de cerrar la renta.","danger",false)'
        ];
        $id = $_POST['id'];
        if ($id) {
            $rent = Rent::find($id);
            if ($rent) {
                date_default_timezone_set('America/Cancun');
                $currentDateTime    = date("Y-m-d H:i:s"); 
                $rent->is_complete  = true;
                $rent->ended        =$currentDateTime;
                if ($rent->save()) {
                    $device = Device::find($rent->equipment);
                    if ($device) {
                        $device->rented = false;
                        if ($device->save()) {
                            $answer['success'] = true;
                            $aLink = "<a target='_blank' href='/rents/ticket/".$rent->id."'><i class='fa fa-file-pdf-o'></i> Ver Recibo</a>";
                            $answer['callbackScript'] = 'showToast("¡Exito! <b>'.$device->name.'</b>","Renta Concluida Correctamente. <br>'.$aLink.'","success",true)';
                            echo json_encode($answer);
                        }
                    }else{
                        echo json_encode($answer);
                    }
                }else{
                    echo json_encode($answer);
                }
            }else{
                echo json_encode($answer);
            }
        }else{
            echo json_encode($answer);
        }
    }

    public function finalize(){
        $answer = [
            'success' => false,
            'callbackScript' =>'showToast("¡Error!","Hubo un error al tratar de cerrar la renta.","danger",false)'
        ];
        $id = $_POST['id'];
        if ($id) {
            $rent = Rent::find($id);
            if ($rent) {
                date_default_timezone_set('America/Cancun');
                $currentDateTime    = date("Y-m-d H:i:s"); 
                $rent->is_complete  = true;
                $rent->anticipated  = true;
                $rent->ended        =$currentDateTime;
                if ($rent->save()) {
                    $device = Device::find($rent->equipment);
                    if ($device) {
                        $device->rented = false;
                        if ($device->save()) {
                            $answer['success'] = true;
                            flash('Renta Finalizada Correctamente.', 'info');
                            $answer['callbackScript'] = 'reloadPage()';
                            echo json_encode($answer);
                        }
                    }else{
                        echo json_encode($answer);
                    }
                }else{
                    echo json_encode($answer);
                }
            }else{
                echo json_encode($answer);
            }
        }else{
            echo json_encode($answer);
        }
    }

    public function generateTicket($id){
        $rent = Rent::find($id);
        $device = Device::find($rent->equipment);
        $minutes = $this->getMinutesBetweenDates($rent->started,$rent->ended);
        $hours = $this->getHoursBetweenDates($rent->started,$rent->ended);
        $totaltime = $hours.' hora(s) '.$minutes.' minuto(s)';
        $total_minutes = $hours * 60;
        $total_minutes += $minutes;
        $fractions = round($total_minutes / $rent->device_minimum);
        if ($fractions < $rent->device_minimum) {
            $totalCharge = $rent->device_rate;
        }else{
            $totalCharge = $fractions * $rent->device_rate;
        }
        return ['rent'=>$rent,'device'=>$device,"timetotal"=>$totaltime,"minutes"=>$minutes,'totalCharge'=>$totalCharge];
    }

    public function ticket($id){
        $values = $this->generateTicket($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('rents.ticket',$values);
        return $pdf->stream('Recibo_Renta_'.$id.'.pdf');
    }

    public function downloadTicket($id){
        $values = $this->generateTicket($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('rents.ticket',$values);
        return $pdf->download('Recibo_Renta_'.$id.'.pdf');;
    }

   

}
