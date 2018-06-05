<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RUT;
use Toastr;
use Excel;
use PDF;
use App\Contract;
use App\Afp;
use App\Civil;
use App\ContractType;
use App\Health;
use App\Salud;
use App\Position;
use App\Worker;
class ContractsController extends Controller
{
    public function index()
    {   
        $contracts = Contract::paginate(22);
        return view('admin.contracts.index')->with(compact('contracts'));
    }

  

    public function show(Request $request)
    {
        
        $query = $request->input('query');
        $workers = Worker::leftjoin('positions','workers.position_id','=','positions.id')
        ->leftjoin('nationalities','workers.nationality_id','=','nationalities.id')
        ->leftjoin('genders','workers.gender_id','=','genders.id')
        ->leftjoin('states','workers.state_id','=','states.id')
        ->leftjoin('locations','workers.location_id','=','locations.id')
        ->select('workers.*','positions.cargo')
        ->where('nombre', 'like',"%$query%")
        ->orwhere('apellidos', 'like',"%$query%")
        ->orwhere('fono', 'like',"%$query%")
        ->orwhere('rut', 'like',"%$query%")
        ->orwhere('positions.cargo', 'like',"%$query%")
        ->orwhere('nationalities.nacionalidad', 'like',"%$query%")
        ->orwhere('genders.genero', 'like',"%$query%")
        ->orwhere('states.estado','like',"%$query%")
        ->orwhere('locations.localidad','like',"%$query%")
        ->paginate(22); 
        if(empty($query)){
            
            $title = "ingrese un criterio para la búsqueda";
            Toastr::warning($title);
            return redirect('/admin/workers/');
        }   
     
        return view('admin.workers.index')->with(compact('workers','query'));
        
    }

    public function create()
    {
        $afps = Afp::orderBy('nombre_afp')->get();
        $civils = Civil::orderBy('estado_civil')->get();
        $contract_types = ContractType::orderBy('nombrecontrato')->get();
        $healths = Health::orderBy('alergia')->get();
        $saluds = Salud::orderBy('nombre_salud')->get();
        $workers = Worker::orderBy('rut')->get();
        return view('admin.contracts.create')->with(compact('afps','civils','contract_types','healths','saluds','workers'));
    }

    public function store(Request $request)
    {
        //validar contrato
        $messages = [
            'rutc.unique' => 'Este contrato ya esta creado',
            'rutc.required' => 'El rut es requerido',
            'civil.required' => 'Campo estado civil es requerido',
            'afp.required' => 'Campo Afp es requerido',
            'salud.required' => 'Campo Salud es requerido',
            'alergia.required' => 'Campo Alergia es requerido',
            'contracttype.required' => 'Campo Tipo de contrato es requerido',
            'tercera.required' => 'Campo Tercera edad es requerido',
            'sueldo.required' => 'Campo Sueldo solo numeros',
        ];      
        $rules = [
            'rutc' => 'required|unique:workers',
            'civil' => 'required',
            'afp' => 'required',
            'salud' => 'required',
            'alergia' => 'required',
            'contracttype' => 'required',
            'tercera' => 'required',
            'sueldo' => 'numeric',
        ];

        $this->validate($request, $rules,$messages);
        //registrar nuevo contrato en la bd
    
        $contract = new Contract();
        $contract->worker_id = $request->input('rutc');
        $contract->fechacontratoi = $request->input('fechacontratoi');
        $contract->fechacontratot = $request->input('fechacontratot');
        $contract->correo = $request->input('correo');
        $contract->civil_id= $request->input('civil');
        $contract->afp_id = $request->input('afp');
        $contract->salud_id = $request->input('salud');
        $contract->alergico = $request->input('alergia');
        $contract->contract_type_id = $request->input('contracttype');
        $contract->sueldo = $request->input('sueldo');
        $contract->terceraedad = $request->input('tercera');
        $contract->cronica = $request->input('cronica');

        if ($contract->save()) {
            $title = "Contrato creado!";
            Toastr::success($title);
            return redirect('/admin/contracts');
         
        }
    }

    public function edit($id)
    {
        $afps = Afp::orderBy('nombre_afp')->get();
        $civils = Civil::orderBy('estado_civil')->get();
        $contract_types = ContractType::orderBy('nombrecontrato')->get();
        $healths = Health::orderBy('alergia')->get();
        $saluds = Salud::orderBy('nombre_salud')->get();
        $workers = Worker::orderBy('rut')->get();
        return view('admin.contracts.create')->with(compact('afps','civils','contract_types','healths','saluds','workers'));
    }
   
    public function view($id)
    {
        $positions = Position::orderBy('cargo')->get();
        $genders = Gender::orderBy('genero')->get();
        $nationalities = Nationality::orderBy('nacionalidad')->get();
        $states = State::orderBy('estado')->get();
        $locations = Location::orderBy('localidad')->get();
        $worker = Worker::find($id);
        return view('admin.workers.view')->with(compact('worker','positions','genders','nationalities','states','locations'));
    }
   


    public function update(Request $request, $id)
    {
          //validar contrato
        $messages = [
            'rut.unique' => 'Este rut ya se encuentra registrado',
            'rut.required' => 'El rut es requerido',
            'civil.required' => 'Campo estado civil es requerido',
            'afp.required' => 'Campo Afp es requerido',
            'salud.required' => 'Campo Salud es requerido',
            'alergia.required' => 'Campo Alergia es requerido',
            'contracttype.required' => 'Campo Tipo de contrato es requerido',
            'tercera.required' => 'Campo Tercera edad es requerido',
            'sueldo.required' => 'Campo Sueldo solo numeros',
        ];      
        $rules = [
            'rut' => 'required|unique:workers',
            'civil' => 'required',
            'afp' => 'required',
            'salud' => 'required',
            'alergia' => 'required',
            'contracttype' => 'required',
            'tercera' => 'required',
            'sueldo' => 'numeric',
        ];
        $this->validate($request, $rules,$messages);

        //registrar nuevo cotrato en la bd
        $contract =  Contract::find($id);
        $contract->worker_id = $request->input('rutc');
        $contract->fechacontratoi = $request->input('fechacontratoi');
        $contract->fechacontratot = $request->input('fechacontratot');
        $contract->correo = $request->input('correo');
        $contract->civil_id= $request->input('civil');
        $contract->afp_id = $request->input('afp');
        $contract->salud_id = $request->input('salud');
        $contract->alergico = $request->input('alergia');
        $contract->contract_type_id = $request->input('contracttype');
        $contract->sueldo = $request->input('sueldo');
        $contract->terceraedad = $request->input('tercera');
        $contract->cronica = $request->input('cronica');
        $contract->save();

        $title = "Contrato editado correctamente!";
        Toastr::success($title);
        return redirect('/admin/contracts');
    }

    public function destroy($id)
    {
        $contract = Contract::find($id);
        $contract->delete();
        $title = "Contrato Eliminado correctamente!";
        Toastr::success($title);
        return back();
    }

}
