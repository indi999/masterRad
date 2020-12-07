<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'user_id', // manager
        'brand',
        'client',
        'sale',
        'desc',
        'date_end',
        'time_end',
        'expected_date_end',
        'expected_time_end',
        'finish',
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class)->withPivot('status'); //, 'task_departments', 'department_id','task_id'
    }


    public function user()
    {
        return $this->hasOne(User::class);
    }
}