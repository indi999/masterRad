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
        //'time_end',
        'expected_date_end',
        //'expected_time_end',
        'finish',
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class)->withPivot('id','is_active','is_late','is_finish'); //, 'task_departments', 'department_id','task_id'
    }


    public function user()
    {
        return $this->hasOne(User::class);
    }
// date mutator
    public function setDateEndTaskAttribute($date_end)
    {
        $this->attributes['date_end'] = strtotime($date_end);
    }
// expected date mutator
    public function setExpectedDateEndTaskAttribute($expected_date_end)
    {
        $this->attributes['expected_date_end'] = strtotime($expected_date_end);
    }

}