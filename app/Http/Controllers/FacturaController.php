<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use DB;
class FacturaController extends Controller
{
  public function index()
  {


    $var = DB::table('factura')
            ->join('residente', 'residente.id', '=', 'factura.residente_id')
            ->join('mes', 'mes.id', '=', 'factura.mes_id')
            ->join('pago', 'pago.id', '=', 'factura.pago_id')
            ->select('factura.id','residente.nombre as resi','mes.nombre','pago.id as pagoid')
            ->get();

    return view('factura/factura',compact('var'));
  }

  public function show($id)
  {
    #$pago=Pago::findOrFail($id);
    $factura = DB::table('factura')
            ->join('residente', 'residente.id', '=', 'factura.residente_id')
            ->join('mes', 'mes.id', '=', 'factura.mes_id')
            ->join('pago', 'pago.id', '=', 'factura.pago_id')
            ->where('factura.id','=', $id)
            ->select('factura.id','residente.nombre as resi','mes.nombre','pago.id as pagoid')
            ->get();
    return view('factura.detalle', compact('factura'));
  }

  public function delete($id)
  {
    Factura::where('id', $id)->delete();
    return redirect('factura/factura');
  }
}
