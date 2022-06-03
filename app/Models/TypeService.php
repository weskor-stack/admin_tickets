<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeService
 *
 * @property $type_service_id
 * @property $name
 * @property $user_id
 * @property $date_registration
 *
 * @property ServiceOrder[] $serviceOrders
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeService extends Model
{
    protected $table = 'type_service';
    protected $primaryKey = 'type_service_id';
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
        return $this->hasMany('App\Models\ServiceOrder', 'type_service_id', 'type_service_id');
    }
    

}
