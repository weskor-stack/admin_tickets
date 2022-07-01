<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TicketStatus
 *
 * @property $status_ticket_id
 * @property $name
 * @property $user_id
 * @property $date_registration
 *
 * @property Ticket[] $tickets
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TicketStatus extends Model
{
    protected $table = 'ticket_status';
    protected $primaryKey = 'status_ticket_id';
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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'status_ticket_id', 'status_ticket_id');
    }
    

}
