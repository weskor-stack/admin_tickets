<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property $service_id
 * @property $date_service
 * @property $status_report_id
 * @property $service_order_id
 * @property $priority_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Activity $activity
 * @property Priority $priority
 * @property ReportStatus $reportStatus
 * @property ServiceOrder $serviceOrder
 * @property ServiceReport[] $serviceReports
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Service extends Model
{
    protected $table = 'service';
    protected $primaryKey = 'service_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'status_report_id' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['status_report_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activity()
    {
        return $this->hasOne('App\Models\Activity', 'service_id', 'service_id');
    }
    
     
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reportStatus()
    {
        return $this->hasOne('App\Models\ReportStatus', 'status_report_id', 'status_report_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceOrder()
    {
        return $this->hasOne('App\Models\ServiceOrder', 'service_order_id', 'service_order_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceReports()
    {
        return $this->hasMany('App\Models\ServiceReport', 'service_id', 'service_id');
    }
    

}
