<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use DB;
class EmpleadoController extends Controller
{
    public function index()
      {
        $var = Empleado::all();
        return view('empleado/empleado',compact('var'));
      }
      public function create()
      {
        $empleado=DB::table('empleado')->get();
        return view('empleado/create', ['empleado'=>$empleado]);
      }
      public function store(Request $request)
      {
        $this->Validate($request, [
          'usuario'=>'required',
          'contrasena'=>'required'
        ]);
        $empleado = new Empleado;
        $empleado->usuario=$request->input('usuario');
        $empleado->contrasena=$request->input('contrasena');

        $empleado->save();
        return redirect('empleado/empleado');
      }
      public function show($id)
      {
        $empleado=Empleado::findOrFail($id);
        return view('empleado.detalle', compact('empleado'));
      }
      public function delete($id)
      {
        Empleado::where('id', $id)->delete();
        return redirect('empleado/empleado');
      }
      public function edit($id)
      {
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
      }
      public function update(Request $request, $id)
      {
        $this->Validate($request, [
          'usuario'=>'required',
          'contrasena'=>'required'

        ]);
        $data=array(
          'usuario'=>$request->input('usuario'),
          'contrasena'=>$request->input('contrasena'),

        );
        Empleado::where('id',$id)->update($data);
        return redirect('empleado/empleado');
      }
}
