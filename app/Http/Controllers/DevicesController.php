<?php

namespace App\Http\Controllers;

use App\Device;
use App\Rent;
use Illuminate\Http\Request;

class DevicesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        date_default_timezone_set('America/Cancun');
        $currentDateTime    = date("Y-m-d H:i:s"); 
        $devices = Device::where('status', 'active')
                       ->orderBy('id', 'asc')
                       ->get();
        $rents = [];
        foreach ($devices as $device) {
            $rents[$device->id] = Rent::where('status', 'active')
                                    ->where('equipment',$device->id)
                                    ->where('is_complete',false)
                                    ->orderBy('id', 'asc')
                                    ->first();
        }
        return view('devices.index', ['devices' => $devices,'rents'=>$rents,'currTime'=>$currentDateTime]);
    }
    public function devices(){
        return view('devices.devices');
    }
    public function getdevices(){
        $answer = [
            'data'=>[]
        ];
        $devices = Device::where('status', 'active')
                       ->orderBy('id', 'asc')
                       ->get();
        foreach ($devices as $device) {
            $actions = [];
            $aux = [];
            $aux[]      = $device->id;
            $aux[]      = $device->name;
            $aux[]      = $device->category;
            $actions[]  = "<a class='btn btn-sm btn-success btn-table' href='/devices/edit/".$device->id."'><i class='fa fa-pencil-square-o'></i></a>";
            $actions[]  = "<a class='btn btn-sm btn-primary btn-table' href='/devices/delete/".$device->id."'><i class='fa fa-trash'></i></a>";
            $aux[]      = join('',$actions); 
            $answer['data'][] = $aux;
        }
        echo json_encode($answer);
    }
    public function _new(){
        return view('devices.new');
    }
    public function create(){
        $name       = isset($_POST['name'])?$_POST['name']:false;
        $category   = isset($_POST['category'])?$_POST['category']:false;
        if ($name && $category) {
            $device = new Device;
            $device->name           = $name;
            $device->category       = $category;
            $device->is_complete    = true;
            $device->rented         = false;
            $device->status         = 'active';
            if ($device->save()) {
                flash()->overlay('Dispositivo creado correctamente.', '¡Exito!');
            }else{
                flash('No se pudo guardar el nuevo registro.', 'danger');
            }
        }else{
            flash('Hacen falta parámetros requeridos para crear el nuevo Dispositivo.', 'danger');
        }
        return redirect("/devices/list");
    }
    public function newRent($id){
        if ($id) {
            $device = Device::find($id);
            if ($device) {
                return view('devices.newrent',['device'=>$device]);
            }else{
                flash('No se encontró el registro que se quiere editar.', 'danger');
                return redirect("/devices");  
            }
        }else{
            flash('No se encontró el registro que se quiere editar.', 'danger');
            return redirect("/devices");
        }
    }
    public function rent($id){
        if ($id) {
            echo var_dump($_POST);
            $device = Device::find($id);
            if ($device) {
                $device->rented = true;
                if ($device->save()) {
                    flash('El dispositivo se ha rentado correctamente.', 'success');
                    return redirect("/devices");  
                }else{
                    flash('No se encontró el dispositivo que se quiere rentar.', 'danger');
                    return redirect("/devices");  
                }
            }else{
                flash('No se encontró el dispositivo que se quiere rentar.', 'danger');
                return redirect("/devices");  
            }
        }else{
            flash('No se encontró el dispositivo que se quiere rentar.', 'danger');
            return redirect("/devices");
        }   
    }

}
