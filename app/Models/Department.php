<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'tbldepartment';
    protected $primaryKey = 'strDepartmentID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    	'strDepartmentName',
    	'strDepartmentDesc',
    	'strStatus',
    ];
    public function employee(){
        return $this->hasOne('App\Models\Employee', 'strDepartmentID', 'strDepartmentID');
    }
}
