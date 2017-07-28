<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'tblsupplier';
    protected $primaryKey = 'strSupplierID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    	'strSupplierName',
    	'strSupStreet',
        'strSupBrgy',
        'strSupCity',
    	'strSupplierDesc',	
    	'strStatus'
    ];
     public function purchase(){
        return $this->hasOne('App\Models\Purchase', 'strSupplierID','strSupplierID');
    }
}
