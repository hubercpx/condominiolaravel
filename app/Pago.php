<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $table='pago';
  protected $primaryKey = 'id';
  public    $timestamps=false;
  protected $fillable=[
    'fecha'
  ];

}
