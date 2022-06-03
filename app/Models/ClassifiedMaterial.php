<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClassifiedMaterial
 *
 * @property $classified_material_id
 * @property $name
 * @property $user_id
 * @property $date_registration
 *
 * @property Material[] $materials
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ClassifiedMaterial extends Model
{
    protected $table = 'classified_material';
    protected $primaryKey = 'classified_material_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materials()
    {
        return $this->hasMany('App\Models\Material', 'classified_material_id', 'classified_material_id');
    }
    

}
