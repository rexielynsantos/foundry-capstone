<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInspection extends Model
{
    protected $table = 'tblprodinspection';
    protected $primaryKey = 'strProdInspectionID';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
    	'strEmployeeID',
    	'strProductID',
    	'timeInspected',
    	'intAcceptHardness',
    	'intAcceptQty',
    	'intReworkHardness',
    	'intReworkQty',
    ];
   
    public function employee() {
        return $this->belongsTo('App\Models\Employee', 'strEmployeeID', 'strEmployeeID');
    }
    public function product(){
        return $this->belongsTo('App\Models\JobTicketDetail', 'strProductID','strProductID');
    }
}
