<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatSpecDetail extends Model
{
    protected $table = 'tblmatspecdetail';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'strMatSpecID',
    	  'strMaterialID',
        'dblMaterialQuantity'
    ];

    public function details(){
              return $this->hasOne('App\Models\Material','strMaterialID','strMaterialID');
    }

}
