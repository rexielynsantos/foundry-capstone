<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TermsCondition extends Model
{
    protected $table = 'tbltermscondition';
    protected $primaryKey = 'strTermID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
	    'strModuleID',
	    'strNote',
	    'strStatus',


    ];
    public function module() {
        return $this->belongsTo('App\Models\Module', 'strModuleID', 'strModuleID');
    }
  
}
