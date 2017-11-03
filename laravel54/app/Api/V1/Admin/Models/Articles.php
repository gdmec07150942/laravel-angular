<?php

namespace App\Api\V1\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
    protected $table = 'articles';
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
