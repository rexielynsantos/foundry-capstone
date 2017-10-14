<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnMaterial extends Model
{
  protected $table = 'tblreturnmaterial';
  public $incrementing = false;
  public $timestamps = false;
  protected $fillable = [
    'strReturnID',
    'strReceivePurchaseID',

  ];
}
