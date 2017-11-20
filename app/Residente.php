<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residente extends Model
{
  protected $table='residente';
  protected $primaryKey = 'id';
  public    $timestamps=false;
  protected $fillable=[
    'nombre'
  ];
}
