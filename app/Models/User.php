<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_id',
        'firstname',
        'lastname',
        'email',
        'is_admin',
        'role',
        'status',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

// ---------------------------------------------------------------------
    public static function managers()
    {
        return static::where('role','manager')->get();
    }

    public static function monitor()
    {
        return static::where('role','monitor')->get();
    }

    public static function sellers()
    {
        return static::where('role','prodavac')->get();
    }
}


