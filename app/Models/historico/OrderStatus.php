<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderStatus
 *
 * @property $status_order_id
 * @property $name
 * @property $user_id
 * @property $date_registration
 *
 * @property ServiceOrder[] $serviceOrders
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrderStatus extends Model
{
    protected $table = 'order_status';
    protected $primaryKey = 'status_order_id';
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
        return $this->hasMany('App\Models\ServiceOrder', 'status_order_id', 'status_order_id');
    }
    

}
