<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'company_id','job_title','job_description', 'salary','location','country'
    ];
}
