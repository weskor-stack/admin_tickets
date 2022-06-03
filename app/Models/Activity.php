<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 *
 * @property $service_id
 * @property $description_activity
 * @property $previous_evidence
 * @property $subsequent_evidence
 * @property $signature_evidence
 * @property $user_id
 * @property $date_registration
 *
 * @property Service $service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Activity extends Model
{
    protected $table = 'activity';
    protected $primaryKey = 'service_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    static $rules = [
		'description_activity' => 'required',
		'previous_evidence' => 'required',
		'subsequent_evidence' => 'required',
    'signature_evidence' => 'required',
    'executor'=>'required',
    'customer'=>'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['previous_evidence','subsequent_evidence','signature_evidence','executor','customer'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service()
    {
        return $this->hasOne('App\Models\Service', 'service_id', 'service_id');
    }
    

}
