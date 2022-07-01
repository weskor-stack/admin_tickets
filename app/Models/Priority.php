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
 * @property Ticket[] $tickets
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
    //protected $fillable = ['priority_id','name','user_id','date_registration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'priority_id', 'priority_id');
    }
    

}
