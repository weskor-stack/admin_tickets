<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeOrder
 *
 * @property $service_order_id
 * @property $employee_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Employee $employee
 * @property ServiceOrder $serviceOrder
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EmployeeOrder extends Model
{
    protected $table = 'employee_order';
    protected $primaryKey = 'employee_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'employee_id' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'employee_id', 'employee_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceOrder()
    {
        return $this->hasOne('App\Models\ServiceOrder', 'service_order_id', 'service_order_id');
    }
    

}
