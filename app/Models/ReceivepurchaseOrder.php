<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivepurchaseOrder extends Model
{
    protected $table = 'tblreceivepurchaseorder';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
      'strReceivePurchaseID',
    	'strPurchaseID',

    ];
}
