<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $table = 'workers';
    protected $fillable = ['name', 'email', 'phone', 'address', 'gender', 'disability', 'level'];
    protected $hidden = ['created_at', 'updated_at'];
}
