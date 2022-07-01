<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ToolAssigned
 *
 * @property $tool_assigned_id
 * @property $tool_id
 * @property $quantity
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
		//'tool_assigned_id' => 'required',
		'tool_id' => 'required',
		'quantity' => 'required',
		//'service_order_id' => 'required',
		//'user_id' => 'required',
		//'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tool_id','quantity'];
    //protected $fillable = ['tool_assigned_id','tool_id','quantity','service_order_id','user_id','date_registration'];


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
