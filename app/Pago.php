<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $table='pago';
  protected $primaryKey = 'id';
  public    $timestamps=false;
  protected $fillable=[
    'empleado_id'
  ];
  public function empleado(){
      return $this->belongsTo('Empledo');
   }
  public function residente(){
      return $this->belongsTo('Residente');
    }
  public function mes(){
     return $this->belongsTo('Mes');
   }
}
