<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceOrder
 *
 * @property $service_order_id
 * @property $date_order
 * @property $ticket_id
 * @property $type_maintenance_id
 * @property $type_service_id
 * @property $status_order_id
 * @property $user_id
 * @property $date_registration
 *
 * @property EmployeeOrder[] $employeeOrders
 * @property MaterialAssigned[] $materialAssigneds
 * @property OrderStatus $orderStatus
 * @property Service[] $services
 * @property Ticket $ticket
 * @property ToolAssigned[] $toolAssigneds
 * @property TypeMaintenance $typeMaintenance
 * @property TypeService $typeService
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ServiceOrder extends Model
{
    protected $table = 'service_order';
    protected $primaryKey = 'service_order_id';
    public $incrementing = false;
    public $timestamps = false;
    
    static $rules = [
		'date_order' => 'required',
		'type_maintenance_id' => 'required',
		'type_service_id' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date_order', 'ticket_id', 'type_maintenance_id','type_service_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeOrders()
    {
        return $this->hasMany('App\Models\EmployeeOrder', 'service_order_id', 'service_order_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialAssigneds()
    {
        return $this->hasMany('App\Models\MaterialAssigned', 'service_order_id', 'service_order_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderStatus()
    {
        return $this->hasOne('App\Models\OrderStatus', 'status_order_id', 'status_order_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany('App\Models\Service', 'service_order_id', 'service_order_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket', 'ticket_id', 'ticket_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function toolAssigneds()
    {
        return $this->hasMany('App\Models\ToolAssigned', 'service_order_id', 'service_order_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeMaintenance()
    {
        return $this->hasOne('App\Models\TypeMaintenance', 'type_maintenance_id', 'type_maintenance_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeService()
    {
        return $this->hasOne('App\Models\TypeService', 'type_service_id', 'type_service_id');
    }
    

}
