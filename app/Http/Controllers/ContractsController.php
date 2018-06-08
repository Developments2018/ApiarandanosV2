<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
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
        $contracts = DB::table('contracts')
        ->join('contract_types','contracts.contract_type_id','=','contract_types.id')
        ->join('afps','contracts.afp_id','=','afps.id')
        ->join('saluds','contracts.salud_id','=','saluds.id')
        ->join('workers','contracts.worker_id','=','workers.id')
        ->join('positions','workers.position_id','=','positions.id')
        ->select('contracts.*','contract_types.*','afps.*','saluds.*','workers.*','positions.*')
        ->paginate(22);
        
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
            'worker_id.unique' => 'Este contrato ya esta creado',
            'worker_id.required' => 'El rut es requerido',
            'civil.required' => 'Campo estado civil es requerido',
            'afp.required' => 'Campo Afp es requerido',
            'salud.required' => 'Campo Salud es requerido',
            'alergia.required' => 'Campo Alergia es requerido',
            'contracttype.required' => 'Campo Tipo de contrato es requerido',
            'tercera.required' => 'Campo Tercera edad es requerido',
            'sueldo.required' => 'Campo Sueldo solo numeros',
        ];      
        $rules = [
            'worker_id' => 'required|unique:contracts',
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
        $contract->worker_id = $request->input('worker_id');
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
        $contracts= Contract::find($id);
        return view('admin.contracts.edit')->with(compact('contracts','afps','civils','contract_types','healths','saluds','workers'));
    }
  
   


    public function update(Request $request, $id)
    {
          //validar contrato
        $messages = [

            'worker_id.required' => 'El rut es requerido',
            'civil_id.required' => 'Campo estado civil es requerido',
            'afp_id.required' => 'Campo Afp es requerido',
            'salud_id.required' => 'Campo Salud es requerido',
            'alergico.required' => 'Campo Alergia es requerido',
            'contract_type_id.required' => 'Campo Tipo de contrato es requerido',
            'tercera.required' => 'Campo Tercera edad es requerido',
            'sueldo.required' => 'Campo Sueldo solo numeros',
        ];      
        $rules = [
    
            'civil_id' => 'required',
            'afp_id' => 'required',
            'salud_id' => 'required',
            'alergico' => 'required',
            'contract_type_id' => 'required',
            'tercera' => 'required',
            'sueldo' => 'numeric',
        ];
        $this->validate($request, $rules,$messages);

        //registrar nuevo cotrato en la bd
        $contracts = Contract::find($id);
        $contracts->worker_id = $request->input('worker_id');
        $contracts->fechacontratoi = $request->input('fechacontratoi');
        $contracts->fechacontratot = $request->input('fechacontratot');
        $contracts->correo = $request->input('correo');
        $contracts->civil_id= $request->input('civil_id');
        $contracts->afp_id = $request->input('afp_id');
        $contracts->salud_id = $request->input('salud_id');
        $contracts->alergico = $request->input('alergico');
        $contracts->contract_type_id = $request->input('contract_type_id');
        $contracts->sueldo = $request->input('sueldo');
        $contracts->terceraedad = $request->input('tercera');
        $contracts->cronica = $request->input('cronica');
        $contracts->save();

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
