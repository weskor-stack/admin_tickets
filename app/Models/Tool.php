<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tool
 *
 * @property $tool_id
 * @property $key
 * @property $name
 * @property $stock
 * @property $unit_measure_id
 * @property $user_id
 * @property $date_registration
 *
 * @property ToolAssigned[] $toolAssigneds
 * @property ToolCost[] $toolCosts
 * @property ToolUsed[] $toolUseds
 * @property UnitMeasure $unitMeasure
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tool extends Model
{
    protected $table = 'tool';
    protected $primaryKey = 'tool_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		//'tool_id' => 'required',
		'key' => 'required',
		'name' => 'required',
		'stock' => 'required',
		'unit_measure_id' => 'required',
		'user_id' => 'required',
		//'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['key','name','unit_measure','stock','user_id'];
    //protected $fillable = ['tool_id','key','name','stock','unit_measure_id','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function toolAssigneds()
    {
        return $this->hasMany('App\Models\ToolAssigned', 'tool_id', 'tool_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function toolCosts()
    {
        return $this->hasMany('App\Models\ToolCost', 'tool_id', 'tool_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function toolUseds()
    {
        return $this->hasMany('App\Models\ToolUsed', 'tool_id', 'tool_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unitMeasure()
    {
        return $this->hasOne('App\Models\UnitMeasure', 'unit_measure_id', 'unit_measure_id');
    }
    

}
