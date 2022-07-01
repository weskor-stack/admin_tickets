<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Material
 *
 * @property $material_id
 * @property $key
 * @property $name
 * @property $unit_measure
 * @property $stock
 * @property $user_id
 * @property $date_registration
 *
 * @property MaterialAssigned $materialAssigned
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
    public function materialAssigned()
    {
        return $this->hasOne('App\Models\MaterialAssigned', 'material_id', 'material_id');
    }
    

}
