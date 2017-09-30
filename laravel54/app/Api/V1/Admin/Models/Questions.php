<?php

namespace App\Api\V1\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends Model
{
    protected $table = 'questions';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
