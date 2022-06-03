<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Priority
 *
 * @property $priority_id
 * @property $name
 * @property $user_id
 * @property $date_registration
 *
 * @property Service[] $services
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Priority extends Model
{
    protected $table = 'priority';
    protected $primaryKey = 'priority_id';
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
    public function ticket()
    {
        return $this->hasMany('App\Models\Ticket', 'priority_id', 'priority_id');
    }
    

}
