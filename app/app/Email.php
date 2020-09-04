<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
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
