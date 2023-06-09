<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string email
 * @property string phone
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @method static updateOrCreate(array $array, array $array1)
 */
class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone',
    ];

}
