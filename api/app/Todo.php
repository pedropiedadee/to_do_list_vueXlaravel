<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'label',
    ];

    public function tasks()
    {
        return $this->hasMany(TodoTask::class);
    }
}
