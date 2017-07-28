<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'tbluseraction';
    protected $primaryKey = 'strUserActionID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    	'strUserActionName',
    	'strUserActionDesc',
    	'strStatus',
    ];
    
    public function module(){
        return $this->belongsTo('App\Models\Module', 'strModuleID');
    }
}
