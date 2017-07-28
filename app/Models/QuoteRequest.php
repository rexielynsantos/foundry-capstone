<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $table = 'tblquoterequest';
    protected $primaryKey = 'strQuoteRequestID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
	    'strCompanyName',
	    'strStreet',
	    'strBrgy',
	    'strCity',
	    'strContactPerson',
	    'strContactNo',
	    'strStatus'

    ];
    public function product(){
        return $this->hasMany('App\Models\QuoteProduct', 'strQuoteRequestID','strQuoteRequestID');
    }
    public function purchase(){
        return $this->hasOne('App\Models\Purchase', 'strQuoteRequestID');
    }
    // public function productvariant(){
    //     return $this->hasMany('App\Models\QuoteProduct', 'strQuoteRequestID','strQuoteRequestID');
    // }
}
