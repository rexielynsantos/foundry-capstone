<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobTicket extends Model
{
    protected $table = 'tbljobticket';
    protected $primaryKey = 'strJobTicketID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
    	'strEmployeeID',
    	'strStageID',
    	'strSubStageID'

    ];

    public function product(){
        return $this->hasMany('App\Models\JobTicketDetail', 'strJobTicketID','strJobTicketID');
    }
    public function employee() {
        return $this->belongsTo('App\Models\Employee', 'strEmployeeID', 'strEmployeeID');
    }
    public function stage() {
        return $this->belongsTo('App\Models\Stage', 'strStageID', 'strStageID');
    }
    public function substage() {
        return $this->belongsTo('App\Models\SubStage', 'strSubStageID', 'strSubStageID');
    }

}
