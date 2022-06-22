<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 *
 * @property $contact_id
 * @property $name
 * @property $last_name
 * @property $email
 * @property $phone
 * @property $customer_id
 * @property $status_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Customer $customer
 * @property Status $status
 * @property Ticket[] $tickets
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'contact_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    static $rules = [
		'name' => 'required',
		'last_name' => 'required',
		'email' => 'required',
		'phone' => 'required',
		//'customer_id' => 'required',
		'status_id' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    //protected $fillable = ['customer_id','name'];
    protected $fillable = ['name','last_name','email','phone','customer_id','status_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'customer_id', 'customer_id');
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
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'contact_id', 'contact_id');
    }
    

}
