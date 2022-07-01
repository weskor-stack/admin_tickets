<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceReport
 *
 * @property $service_report_id
 * @property $time_entry
 * @property $time_completion
 * @property $lunchtime
 * @property $service_hours
 * @property $service_extras
 * @property $duration_travel
 * @property $date_service
 * @property $service_id
 * @property $employee_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Employee $employee
 * @property Service $service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ServiceReport extends Model
{
    protected $table = 'service_report';
    protected $primaryKey = 'service_report_id';
    public $incrementing = false;
    public $timestamps = false;
    static $rules = [
		'time_entry' => 'required',
		'time_completion' => 'required',
		'lunchtime' => 'required',
		//'service_hours' => 'required',
		'service_extras' => 'required',
		'duration_travel' => 'required',
		'date_service' => 'required',
		'employee_id' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['time_entry','time_completion','lunchtime','service_hours','service_extras','duration_travel','date_service','employee_id','user_id'];


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
    public function service()
    {
        return $this->hasOne('App\Models\Service', 'service_id', 'service_id');
    }
    

}
