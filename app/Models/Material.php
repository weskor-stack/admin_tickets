<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Material
 *
 * @property $material_id
 * @property $key
 * @property $name
 * @property $stock
 * @property $classified_material_id
 * @property $unit_measure_id
 * @property $user_id
 * @property $date_registration
 *
 * @property ClassifiedMaterial $classifiedMaterial
 * @property MaterialAssigned[] $materialAssigneds
 * @property MaterialCost[] $materialCosts
 * @property MaterialUsed[] $materialUseds
 * @property UnitMeasure $unitMeasure
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Material extends Model
{
    protected $table = 'material';
    protected $primaryKey = 'material_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'name' => 'required',
		'stock' => 'required',
		'classified_material_id' => 'required',
		'unit_measure_id' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','stock','classified_material_id','unit_measure_id','user_id'];
    //protected $fillable = ['material_id','key','name','stock','classified_material_id','unit_measure_id','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function classifiedMaterial()
    {
        return $this->hasOne('App\Models\ClassifiedMaterial', 'classified_material_id', 'classified_material_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialAssigneds()
    {
        return $this->hasMany('App\Models\MaterialAssigned', 'material_id', 'material_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialCosts()
    {
        return $this->hasMany('App\Models\MaterialCost', 'material_id', 'material_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialUseds()
    {
        return $this->hasMany('App\Models\MaterialUsed', 'material_id', 'material_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unitMeasure()
    {
        return $this->hasOne('App\Models\UnitMeasure', 'unit_measure_id', 'unit_measure_id');
    }
    

}
