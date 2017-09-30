<?php
/**
 * Created by PhpStorm.
 * User: yovan
 * Date: 17-7-16
 * Time: 下午10:23
 */

namespace App\Api\V1\Admin\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Authenticatable
{
    protected $table = 'users';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}