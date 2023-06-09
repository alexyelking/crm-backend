<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Ramsey\Collection\Collection;

/**
 * @property int id
 * @property string name
 * @property string email
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @method static updateOrCreate(array $array, array $array1)
 *
 * Отношения
 * @property Collection emails
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     *
     * Get the emails for the user.
     *
     */
    public function emails()
    {
        return $this->hasMany('App\Email');
    }

}
