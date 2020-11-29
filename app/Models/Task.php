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
        'user_id',
        'brand',
        'client',
        'sale',
        'desc',
        'status',
        'date_end',
        'time_end',
        'expected_date_end',
        'expected_time_end',
    ];

    public function deparments()
    {
        return $this->belongsToMany(Deparment::class, 'task_deparment', 'deparment_id','task_id');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}