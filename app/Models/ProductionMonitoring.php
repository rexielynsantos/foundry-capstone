<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionMonitoring extends Model
{
    protected $table = 'tbljobstage';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
    	'strStageID',
    	'strJobOrderID',
    	'boolIsDone',
    ];

    public function stage(){
        return $this->hasMany('App\Models\Stage','strStageID','strStageID');
    }

    public function joborder(){
    	return $this->belongsTo('App\Models\QuoteJobOrder', 'strJobOrderID', 'strJobOrderID');
    }
}
