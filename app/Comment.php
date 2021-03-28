<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //mass assignment
    protected $fillable = [
        'user_id', 
        'title', 
        'body',
        'slug', 
    ];

    //relazione comments -user
    public function user() {
        return $this->belongsTo('App\User');
    }
}
