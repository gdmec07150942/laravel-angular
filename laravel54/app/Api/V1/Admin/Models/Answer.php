<?php

namespace App\Api\V1\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    public function users()
    {
        return $this->belongsToMany('App\Api\V1\Admin\Models\User')->withPivot('vote')->withTimestamps();
    }


}
