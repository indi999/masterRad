<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'saller_id', // saller
        'desc',
        'date_end',
        'time_end',
        'expected_date_end',
        'expected_time_end',
        'finish',
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class)->withPivot('id','is_active','is_late','is_finish','updated_at'); //, 'task_departments', 'department_id','task_id' updated_at , updated_at}}
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function saller()
    {
        return $this->belongsTo(User::class, 'saller_id'); // select user use saller_id
    }


// date mutator
    public function setDateEndAttribute($date_end)
    {
        $this->attributes['date_end'] = Carbon::createFromFormat('m/d/Y', $date_end)->format('Y-m-d\TH:i');
    }
    /*
    public function setTimeEndAttribute($time_end)
    {
        $this->attributes['time_end'] = Carbon::parse($time_end)->format('H:i');
    }
    */
    public function getDateEndAttribute($date_end)
    {
        return Carbon::parse($date_end)->format('m/d/Y');
    }

// expected date mutator
    public function setExpectedDateEndAttribute($expected_date_end)
    {
        $this->attributes['expected_date_end'] = Carbon::createFromFormat('m/d/Y', $expected_date_end)->format('Y-m-d\TH:i');
    }
    /*
    public function setExpectedTimeEndAttribute($expected_time_end)
    {
        $this->attributes['expected_time_end'] = Carbon::parse($expected_time_end)->format('H:i');
    }
    */
    public function getExpectedDateEndAttribute($expected_date_end)
    {
        return Carbon::parse($expected_date_end)->format('m/d/Y');
    }


}
