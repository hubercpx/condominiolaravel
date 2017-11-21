<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use DB;
class PagoController extends Controller
{
  public function index()
  {


    $var = DB::table('pago')
            ->join('empleado', 'empleado.id', '=', 'pago.empleado_id')
            ->join('residente', 'residente.id', '=', 'pago.residente_id')
            ->join('mes', 'mes.id', '=', 'pago.mes_id')
            ->select('pago.id','empleado.usuario','residente.nombre as resi','pago.fecha', 'pago.monto','mes.nombre')
            ->get();

    return view('pago/pago',compact('var'));
  }

  public function create()
  {
    $pago=DB::table('pago')->get();

    $emplea = DB::table('empleado')->get();
    $resi = DB::table('residente')->get();
    $me = DB::table('mes')->get();



    return view('pago/create', compact('emplea','resi','me'));

  }
  public function store(Request $request)
  {
    $this->Validate($request, [
      'empleado_id'=>'required',
      'residente_id'=>'required',
      'fecha'=>'required',
      'monto'=>'required',
      'mes_id'=>'required',
    ]);
    $pago = new Pago;
    $pago->empleado_id=$request->input('empleado_id');
    $pago->residente_id=$request->input('residente_id');
    $pago->fecha=$request->input('fecha');
    $pago->monto=$request->input('monto');
    $pago->mes_id=$request->input('mes_id');

    $pago->save();
    return redirect('pago/pago');
  }

  public function show($id)
  {
    #$pago=Pago::findOrFail($id);
    $pago = DB::table('pago')
            ->join('empleado', 'empleado.id', '=', 'pago.empleado_id')
            ->join('residente', 'residente.id', '=', 'pago.residente_id')
            ->join('mes', 'mes.id', '=', 'pago.mes_id')
            ->where('pago.id','=', $id)
            ->select('pago.id as idd','empleado.usuario','residente.nombre as resi','pago.fecha', 'pago.monto','mes.nombre')
            ->get();
    return view('pago.detalle', compact('pago'));
  }

  public function delete($id)
  {
    Pago::where('id', $id)->delete();
    return redirect('pago/pago');
  }



}
