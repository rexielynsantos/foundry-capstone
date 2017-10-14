<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobTicketDetail extends Model
{
    protected $table = 'tbljobticketdetail';
    public $incrementing = false;
    public $timestamps = true;
     
    protected $fillable = [
    	'strJobTicketID',
    	'strProductID',
        // 'strCastingID',
        'dblJobFinished',
        'timeStarted',
        'timeFinished'
    ];
   
    public function details(){
        return $this->hasOne('App\Models\Product','strProductID','strProductID');
    }
    public function prodinspection(){
        return $this->hasOne('App\Models\ProductInspection', 'strEmployeeID');
    }
}
