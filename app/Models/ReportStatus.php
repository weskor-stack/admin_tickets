<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportStatus
 *
 * @property $status_report_id
 * @property $name
 * @property $user_id
 * @property $date_registration
 *
 * @property Service[] $services
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ReportStatus extends Model
{
  protected $table = 'report_status';
  protected $primaryKey = 'status_report_id';
  public $incrementing = false;
  public $timestamps = false;
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','user_id'];
    //protected $fillable = ['status_report_id','name','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany('App\Models\Service', 'status_report_id', 'status_report_id');
    }
    

}
