<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StageDetail extends Model
{
    protected $table = 'tblstagedetail';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
    	'strStageID',
    	'strSubStageID',
    ];
   
    public function details1(){
        return $this->hasOne('App\Models\SubStage','strSubStageID','strSubStageID');
    }
}
