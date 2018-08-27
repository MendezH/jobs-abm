<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'order'
    ];

    public function task()
    {
        return $this->hasOne('App\Task');
    }
}
