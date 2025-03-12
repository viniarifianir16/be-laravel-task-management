<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'name',
        'position',
    ];

    public function tasks()
    {
        return $this->hasMany(Tasks::class);
    }
}
