<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 *
 * @property $employee_id
 * @property $name
 * @property $last_name
 * @property $email
 * @property $picture
 * @property $status_id
 * @property $user_id
 * @property $date_registration
 *
 * @property EmployeeOrder[] $employeeOrders
 * @property ServiceReport[] $serviceReports
 * @property Status $status
 * @property SupervisorEmploye[] $supervisorEmployes
 * @property SupervisorEmploye[] $supervisorEmployes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'employee_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'name' => 'required',
		'last_name' => 'required',
		'email' => 'required',
		'picture' => 'required',
		'status_id' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','last_name','email','picture','status_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeOrders()
    {
        return $this->hasMany('App\Models\EmployeeOrder', 'employee_id', 'employee_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceReports()
    {
        return $this->hasMany('App\Models\ServiceReport', 'employee_id', 'employee_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne('App\Models\Status', 'status_id', 'status_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supervisorEmployes()
    {
        return $this->hasMany('App\Models\SupervisorEmploye', 'employee_employee_id', 'employee_id');
    }
    

}
