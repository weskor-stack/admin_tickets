<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MaterialAssigned
 *
 * @property $material_id
 * @property $quantity
 * @property $unit_measure
 * @property $usage
 * @property $service_order_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Material $material
 * @property ServiceOrder $serviceOrder
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MaterialAssigned extends Model
{
    protected $table = 'material_assigned';
    protected $primaryKey = 'material_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
        'material_id' => 'required',
		'quantity' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['material_id','quantity'];
    //protected $fillable = ['quantity','unit_measure','usage','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function material()
    {
        return $this->hasOne('App\Models\Material', 'material_id', 'material_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceOrder()
    {
        return $this->hasOne('App\Models\ServiceOrder', 'service_order_id', 'service_order_id');
    }
    

}
