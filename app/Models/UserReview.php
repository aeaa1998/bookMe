<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    /**
     * Get the client user related to this review
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'id', 'customer_id');
    }

    /**
     * Get the user related to this review
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'user_id');
    }
}
