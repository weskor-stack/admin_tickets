<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 *
 * @property $status_id
 * @property $name
 * @property $user_id
 * @property $date_registration
 *
 * @property Contact[] $contacts
 * @property Customer[] $customers
 * @property Employee[] $employees
 * @property EmployeeOrder[] $employeeOrders
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'status_id';
    public $incrementing = false;
    public $timestamps = false;
    static $rules = [
		//'status_id' => 'required',
		'name' => 'required',
		//'user_id' => 'required',
		//'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','user_id'];
    //protected $fillable = ['status_id','name','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact', 'status_id', 'status_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers()
    {
        return $this->hasMany('App\Models\Customer', 'status_id', 'status_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'status_id', 'status_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeOrders()
    {
        return $this->hasMany('App\Models\EmployeeOrder', 'status_id', 'status_id');
    }
    

}
