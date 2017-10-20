<?php

namespace App\Api\V1\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends Model
{
    protected $table = 'questions';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\Api\V1\Admin\Models\User');
    }

    public function answers()
    {
        return $this->hasMany('App\Api\V1\Admin\Models\Answer');
    }
}
