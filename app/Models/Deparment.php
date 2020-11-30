<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deparment extends Model
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
        return $this->belongsToMany(Task::class, 'task_deparments');  //,'task_id', 'deparment_id'
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

