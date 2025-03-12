<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'employee_id',
        'task_name',
        'due_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employees::class);
    }
}
