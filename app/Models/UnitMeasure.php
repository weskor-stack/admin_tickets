<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UnitMeasure
 *
 * @property $unit_measure_id
 * @property $name
 * @property $abbreviation
 * @property $user_id
 * @property $date_registration
 *
 * @property Material[] $materials
 * @property Tool[] $tools
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UnitMeasure extends Model
{
    protected $table = 'unit_measure';
    protected $primaryKey = 'unit_measure_id';
    public $incrementing = false;
    public $timestamps = false;
    static $rules = [
		//'unit_measure_id' => 'required',
		'name' => 'required',
		'abbreviation' => 'required',
		//'user_id' => 'required',
		//'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    protected $fillable = ['name','abbreviation','user_id'];
    //protected $fillable = ['unit_measure_id','name','abbreviation','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materials()
    {
        return $this->hasMany('App\Models\Material', 'unit_measure_id', 'unit_measure_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tools()
    {
        return $this->hasMany('App\Models\Tool', 'unit_measure_id', 'unit_measure_id');
    }
    

}
