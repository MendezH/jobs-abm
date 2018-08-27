<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id', 'job_id', 'rol_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function job()
    {
        return $this->belongsTo('App\Job');
    }
}
