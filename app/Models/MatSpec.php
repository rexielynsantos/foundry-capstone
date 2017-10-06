<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatSpec extends Model
{
    protected $table = 'tblmatspec';
    protected $primaryKey = 'strMatSpecID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
      'strVarianceCode',
    	'strProductID',
    	'strStatus',
    ];
    public function material(){
        return $this->hasMany('App\Models\MatSpecDetail', 'strMatSpecID','strMatSpecID');
    }
    public function product() {
        return $this->belongsTo('App\Models\Product', 'strProductID', 'strProductID');
    }
    public function quotejob(){
        return $this->hasOne('App\Models\QuoteJobOrder', 'strMatSpecID', 'strMatSpecID');
    }
}
