<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'tblmodule';
    protected $primaryKey = 'strModuleID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    	'strModuleName',
    	'strModuleDesc',
        'strDepartmentID',
    	'strStatus',
    ];
    
    public function department() {
        return $this->belongsTo('App\Models\Department', 'strDepartmentID', 'strDepartmentID');
    }

}
