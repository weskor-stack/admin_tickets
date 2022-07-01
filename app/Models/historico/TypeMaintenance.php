<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeMaintenance
 *
 * @property $type_maintenance_id
 * @property $name
 * @property $user_id
 * @property $date_registration
 *
 * @property ServiceOrder[] $serviceOrders
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeMaintenance extends Model
{
    protected $table = 'type_maintenance';
    protected $primaryKey = 'type_maintenance_id';
    public $incrementing = false;
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
    protected $fillable = ['name','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceOrders()
    {
        return $this->hasMany('App\Models\ServiceOrder', 'type_maintenance_id', 'type_maintenance_id');
    }
    

}
