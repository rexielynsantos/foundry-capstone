<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnDetail extends Model
{
  protected $table = 'tblreturndetail';
  public $incrementing = false;
  public $timestamps = true;
  protected $fillable = [
      'strReturnID',
     'strMaterialID',
      // 'strReceivePurchaseID',
      'quantityReturned',
      'isActive'

  ];
  public function details(){
      return $this->hasOne('App\Models\Material','strMaterialID', 'strMaterialID');
  }
  // public function received() {
  //     return $this->belongsTo('App\Models\ReceivePurchase', 'strReceivePurchaseID', 'strReceivePurchaseID');
  // }
}
