<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
