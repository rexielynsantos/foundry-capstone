<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnHeader extends Model
{
  protected $table = 'tblreturnheader';
  protected $primaryKey = 'strReturnID';
  public $incrementing = false;
  public $timestamps = true;
  protected $fillable = [
      'strSupplierID',
     'strReceivePurchaseID',
      'dateReturned'
  ];
  public function supplier() {
      return $this->belongsTo('App\Models\Supplier', 'strSupplierID', 'strSupplierID');
  }
  public function returned(){
      return $this->hasMany('App\Models\ReturnDetail', 'strReturnID','strReturnID');
  }
}
