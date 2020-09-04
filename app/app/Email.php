<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string user_id
 * @property int email
 * @property string body
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */
class Email extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'to', 'body',
    ];

    /**
     *
     * Get the user that owns the email.
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}