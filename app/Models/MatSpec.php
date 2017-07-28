<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatSpec extends Model
{
    protected $table = 'tblmatspec';
    protected $primaryKey = 'strMatSpecID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    	'strProductID',
    	'strStatus',
    ];
    public function material(){
        return $this->hasMany('App\Models\MatSpecDetail', 'strMaterialID','strMaterialID');
    }
    public function product() {
        return $this->belongsTo('App\Models\Product', 'strProductID', 'strProductID');
    }

}
