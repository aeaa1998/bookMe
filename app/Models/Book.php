<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * Get user associated with this book
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get course associated with this book
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    /**
     * Get publisher associated with this book
     */
    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher');
    }


    /**
     * Get book status associated with this book
     */
    public function status()
    {
        return $this->belongsTo('App\Models\BookStatus');
    }

    /**
     * Get book type associated with this book
     */
    public function type()
    {
        return $this->belongsTo('App\Models\BookType');
    }

    /**
     * Get book records associated with this book
     */
    public function records()
    {
        return $this->hasMany('App\Models\BookRecord');
    }
}
