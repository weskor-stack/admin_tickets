<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 *
 * @property $ticket_id
 * @property $subject
 * @property $problem
 * @property $date_ticket
 * @property $status_ticket_id
 * @property $customer_id
 * @property $contact_id
 * @property $user_id
 * @property $date_registration
 *
 * @property Contact $contact
 * @property Customer $customer
 * @property ServiceOrder[] $serviceOrders
 * @property TicketStatus $ticketStatus
 * @property TicketTracking[] $ticketTrackings
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ticket extends Model
{
    protected $table = 'ticket';
    protected $primaryKey = 'ticket_id';
    public $incrementing = false;
    public $timestamps = false;
    static $rules = [
		'subject' => 'required',
		'problem' => 'required',
		'customer_id' => 'required',
		'contact_id' => 'required',
		'user_id' => 'required',
        'priority_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['subject', 'ticket_id','problem','customer_id','contact_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contact()
    {
        return $this->hasOne('App\Models\Contact', 'contact_id', 'contact_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'customer_id', 'customer_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceOrders()
    {
        return $this->hasMany('App\Models\ServiceOrder', 'ticket_id', 'ticket_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticketStatus()
    {
        return $this->hasOne('App\Models\TicketStatus', 'status_ticket_id', 'status_ticket_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketTrackings()
    {
        return $this->hasMany('App\Models\TicketTracking', 'ticket_id', 'ticket_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function priority()
    {
        return $this->hasOne('App\Models\Priority', 'priority_id', 'priority_id');
    }
    

}
