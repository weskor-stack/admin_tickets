<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SupervisorEmployee
 *
 * @property $supervisor_employee_id
 * @property $employee_id
 * @property $department_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Department $department
 * @property Employee $employee
 * @property Employee $employee
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SupervisorEmployee extends Model
{
    protected $table = 'supervisor_employee';
    protected $primaryKey = 'supervisor_employee_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'supervisor_employee_id' => 'required',
		'employee_id' => 'required',
		'department_id' => 'required',
		//'user_id' => 'required',
		//'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['supervisor_employee_id','employee_id','department_id'];
    //protected $fillable = ['supervisor_employee_id','employee_id','department_id','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department()
    {
        return $this->hasOne('App\Models\Department', 'department_id', 'department_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'employee_id', 'supervisor_employee_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee2()
    {
        return $this->hasOne('App\Models\Employee', 'employee_id', 'employee_id');
    }
    

}
