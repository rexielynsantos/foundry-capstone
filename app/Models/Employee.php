<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'tblemployee';
    protected $primaryKey = 'strEmployeeID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
	    'strEmployeeLast',
	    'strEmployeeFirst',
	    'strEmployeeMiddle',
        'strEmployeeEmail',
        'strEmployeeContact',
	    'strJobTitleID',
	    'strDepartmentID',
	    'strEmployeeImagePath',
	    'strTempImage',
	    'strStatus'

    ];
    public function department() {
        return $this->belongsTo('App\Models\Department', 'strDepartmentID', 'strDepartmentID');
    }
    public function jobtitle() {
        return $this->belongsTo('App\Models\JobTitle', 'strJobTitleID', 'strJobTitleID');
    }
    public function jobticket(){
        return $this->hasOne('App\Models\JobTicket', 'strEmployeeID');
    }
    public function prodinspection(){
        return $this->hasOne('App\Models\ProductInspection', 'strEmployeeID');
    }
}
