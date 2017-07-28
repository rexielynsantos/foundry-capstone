<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatSpecDetail extends Model
{
    protected $table = 'tblmatspecdetail';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
    	'strMaterialID',
    	'strMatSpecID',
    	'dblMaterialQuantity',
    	'strUOMID',
    ];
   
    public function matdetails(){
        return $this->hasOne('App\Models\Material','strMaterialID','strMaterialID');
    }
}
