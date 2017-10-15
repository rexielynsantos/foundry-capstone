<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'tblstage';
    protected $primaryKey = 'strStageID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
    	'strStageName',
        'dbltimeRequired',
    	'strStageDesc',
    	'strStatus',
    ];
    
    public function substage(){
        return $this->hasMany('App\Models\StageDetail', 'strStageID','strStageID');
    }
    public function jobticket(){
        return $this->hasOne('App\Models\JobTicket', 'strStageID');
    }
}
