<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteProduct extends Model
{
    protected $table = 'tblquoterequestproduct';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
	    'strQuoteRequestID',
	    'strProductID',
	    'strRemarks'
    ];
    public function details4(){
        return $this->hasOne('App\Models\Product','strProductID','strProductID');
    }

}
