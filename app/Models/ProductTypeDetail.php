<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTypeDetail extends Model
{
    protected $table = 'tblproducttypedetail';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
    	'strProductTypeID',
    	'strStageID',
    ];
   
    public function details(){
        return $this->hasOne('App\Models\Stage','strStageID','strStageID');
    }
}
