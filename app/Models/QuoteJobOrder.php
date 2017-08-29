<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteJobOrder extends Model
{
    protected $table = 'tblquotejoborder';
    protected $primaryKey = 'strJobOrderID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
	    'strQuoteRequestID',
	    'strProductID',
        'strMatSpecID'
    ];
    public function quotedetails(){
        return $this->belongsTo('App\Models\QuoteRequest','strQuoteRequestID','strQuoteRequestID');
    }
    public function product(){
        return $this->belongsTo('App\Models\QuoteProductVariant','strQuoteRequestID','strQuoteRequestID');
    }
    public function matspec() {
        return $this->belongsTo('App\Models\MatSpec', 'strMatSpecID', 'strMatSpecID');
    }

}
