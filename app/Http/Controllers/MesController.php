<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mes;
use DB;
class MesController extends Controller
{
    public function index()
    {
      $var = Mes::all();
      return view('mes/mes',compact('var'));
    }
    public function create()
    {
      $mes=DB::table('mes')->get();
      return view('mes/create', ['mes'=>$mes]);
    }
    public function store(Request $request)
    {
      $this->Validate($request, [
        'nombre'=>'required'
      ]);
      $mes = new Mes;
      $mes->nombre=$request->input('nombre');

      $mes->save();
      return redirect('mes/mes');
    }
    public function show($id)
    {
      $mes=Mes::findOrFail($id);
      return view('mes.detalle', compact('mes'));
    }
    public function delete($id)
    {
      Mes::where('id', $id)->delete();
      return redirect('mes/mes');
    }
    public function edit($id)
    {
      $mes=Mes::findOrFail($id);
      return view('mes.edit', compact('mes'));
    }
    public function update(Request $request, $id)
    {
      $this->Validate($request, [
        'nombre'=>'required'

      ]);
      $data=array(
        'nombre'=>$request->input('nombre'),


      );
      Mes::where('id',$id)->update($data);
      return redirect('mes/mes');
    }
}
