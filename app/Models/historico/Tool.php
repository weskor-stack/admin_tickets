<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tool
 *
 * @property $tool_id
 * @property $key
 * @property $name
 * @property $unit_measure
 * @property $stock
 * @property $user_id
 * @property $date_registration
 *
 * @property ToolAssigned $toolAssigned
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
		'key' => 'required',
		'name' => 'required',
		'unit_measure' => 'required',
		'stock' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['key','name','unit_measure','stock','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function toolAssigned()
    {
        return $this->hasOne('App\Models\ToolAssigned', 'tool_id', 'tool_id');
    }
    

}
