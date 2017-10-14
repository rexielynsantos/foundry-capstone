<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costing extends Model
{
    protected $table = 'tblcosting';
    protected $primaryKey = 'strCostingID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
    	'strCustomerID',
    	'strProductID',
    	'dblSpecificGravity',
    	'dblSurfaceArea',
    	'dblMainVolume',
    	'dblWeightNonFilled',
    	'dblWeightFilled',
    	'dblWeightSoluble',
    	'dblWeightReclaimed',
    	'dblWeightAsMetal',
    	'dblRunnerType',
    	'dblArea',
    	'dblSideVolume',
    	'dblWeight',
    	'dblSprueType',
    	'dblClusterArea',
    	'dblClusterWeightAsWax',
    	'dblClusterWeightAsMetal',
    	'intPcsPerCluster',
    	'dblEfficiencyAtInjection',
    	'dblEfficiencyAtAssembly',
    	'dblEfficiencyAtCoating',
    	'dblEfficiencyAtCasting',
    	'strCostingStatus'


    ];
    public function costingmaterial(){
        return $this->hasMany('App\Models\CostingMaterial', 'strCostingID','strCostingID');
    }
 	public function product(){
        return $this->hasMany('App\Models\Product', 'strProductID','strProductID');
    }
    public function customer(){
        return $this->hasMany('App\Models\Customer', 'strCustomerID','strCustomerID');
    }
    public function quotation(){
        return $this->hasOne('App\Models\Quotation', 'strCostingID', 'strCostingID');
    }
}
