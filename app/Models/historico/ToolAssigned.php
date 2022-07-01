<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ToolAssigned
 *
 * @property $tool_id
 * @property $quantity
 * @property $unit_measure
 * @property $usage
 * @property $service_order_id
 * @property $user_id
 * @property $date_registration
 *
 * @property ServiceOrder $serviceOrder
 * @property Tool $tool
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ToolAssigned extends Model
{
    protected $table = 'tool_assigned';
    protected $primaryKey = 'tool_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
        'tool_id' => 'required',
		'quantity' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tool_id','quantity'];
    //protected $fillable = ['quantity','unit_measure','usage','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceOrder()
    {
        return $this->hasOne('App\Models\ServiceOrder', 'service_order_id', 'service_order_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tool()
    {
        return $this->hasOne('App\Models\Tool', 'tool_id', 'tool_id');
    }
    

}
