<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Residente;
use DB;
class ResidenteController extends Controller
{
    public function index()
    {
      $var = Residente::all();
      return view('residente/residente',compact('var'));
    }
    public function create()
    {
      $residente=DB::table('residente')->get();
      return view('residente/create', ['residente'=>$residente]);
    }
    public function store(Request $request)
    {
      $this->Validate($request, [
        'nombre'=>'required',
        'apellido'=>'required',
        'nit'=>'required',
        'email'=>'required'
      ]);
      $residente = new Residente;
      $residente->nombre=$request->input('nombre');
      $residente->apellido=$request->input('apellido');
      $residente->nit=$request->input('nit');
      $residente->email=$request->input('email');

      $residente->save();
      return redirect('residente/residente');
    }
    public function show($id)
    {
      $residente=Residente::findOrFail($id);
      return view('residente.detalle', compact('residente'));
    }
    public function delete($id)
    {
      Residente::where('id', $id)->delete();
      return redirect('residente/residente');
    }
    public function edit($id)
    {
      $residente=Residente::findOrFail($id);
      return view('residente.edit', compact('residente'));
    }
    public function update(Request $request, $id)
    {
      $this->Validate($request, [
        'nombre'=>'required',
        'apellido'=>'required',
        'nit'=>'required',
        'email'=>'required'

      ]);
      $data=array(
        'nombre'=>$request->input('nombre'),
        'apellido'=>$request->input('apellido'),
        'nit'=>$request->input('nit'),
        'email'=>$request->input('email'),


      );
      Residente::where('id',$id)->update($data);
      return redirect('residente/residente');
    }
}
