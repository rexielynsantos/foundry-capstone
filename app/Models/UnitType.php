<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitType extends Model
{
    protected $table = 'tbluomtype';
    protected $primaryKey = 'strUOMTypeID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    	'strUOMTypeName',
    	'strUOMTypeDesc',
    	'strStatus'
    ];
    public function unit(){
        return $this->hasOne('App\Models\Unit', 'strUOMTypeID');
    }
}
