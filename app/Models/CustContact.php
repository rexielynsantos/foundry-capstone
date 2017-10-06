<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustContact extends Model
{
    protected $table = 'tblcustcontact';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
    	'strCustomerID',
    	'strContactPersonName',
    	'strContactNo'
    ];
   
}
