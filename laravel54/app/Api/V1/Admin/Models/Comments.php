<?php

namespace App\Api\V1\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    protected $table = 'comments';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
