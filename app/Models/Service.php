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
 * @property $user_id
 * @property $date_registration
 *
 * @property MaterialUsed[] $materialUseds
 * @property ReportStatus $reportStatus
 * @property ServiceOrder $serviceOrder
 * @property ServiceReport[] $serviceReports
 * @property ServiceTaskSpecific $serviceTaskSpecific
 * @property ToolUsed[] $toolUseds
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
		//'service_id' => 'required',
		//'date_service' => 'required',
		'status_report_id' => 'required',
		//'service_order_id' => 'required',
		'user_id' => 'required',
		//'date_registration' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['status_report_id','user_id'];
    //protected $fillable = ['service_id','date_service','status_report_id','service_order_id','user_id','date_registration'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialUseds()
    {
        return $this->hasMany('App\Models\MaterialUsed', 'service_id', 'service_id');
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
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceTaskSpecific()
    {
        return $this->hasOne('App\Models\ServiceTaskSpecific', 'service_id', 'service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function toolUseds()
    {
        return $this->hasMany('App\Models\ToolUsed', 'service_id', 'service_id');
    }
    

}
