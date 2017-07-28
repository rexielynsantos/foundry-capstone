<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobTicketDetail extends Model
{
    protected $table = 'tbljobticketdetail';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
    	'strJobTicketID',
    	'strProductID',
        'dblJobFinished',
        'timeStarted',
        'timeFinished'


    ];
   
    public function details(){
        return $this->hasOne('App\Models\Product','strProductID','strProductID');
    }
}
