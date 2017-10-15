<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubStage extends Model
{
    protected $table = 'tblsubstage';
    protected $primaryKey = 'strSubStageID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
    	'strSubStageName',
        'dbltimeRequired',
    	'strSubStageDesc',
    	'strStatus',
    ];

    public function jobticket(){
        return $this->hasOne('App\Models\JobTicket', 'strSubStageID');
    }
   
}
