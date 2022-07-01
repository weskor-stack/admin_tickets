<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 *
 * @property $department_id
 * @property $name
 * @property $user_id
 * @property $date_registration
 *
 * @property SupervisorEmployee[] $supervisorEmployees
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Department extends Model
{
    protected $table = 'department';
    protected $primaryKey = 'department_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'name' => 'required',
		'user_id' => 'required',
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
    public function supervisorEmployees()
    {
        return $this->hasMany('App\Models\SupervisorEmployee', 'department_id', 'department_id');
    }
    

}
