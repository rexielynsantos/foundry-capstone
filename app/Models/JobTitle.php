<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    protected $table = 'tbljobtitle';
    protected $primaryKey = 'strJobTitleID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
	    'strJobTitleName',
	    'strJobTitleDesc',
	    'strStatus'

    ];
    public function employee(){
        return $this->hasOne('App\Models\Employee', 'strJobTitleID', 'strJobTitleID');
    }
}
