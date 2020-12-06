<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_departments');  //,'task_id', 'department_id'
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

