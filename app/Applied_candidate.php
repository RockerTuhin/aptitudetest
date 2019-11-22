<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applied_candidate extends Model
{
    protected $fillable = [
        'user_id','job_id',
    ];
}
