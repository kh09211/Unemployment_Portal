<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    Public function dashes() {
        // convert the number into a number with dashes
        $number = $this->email;
        $formatted_number = preg_replace("/^(\d{3})(\d{2})(\d{4})$/", "$1-$2-$3", $number);

        return $formatted_number;
    }

    Public function profile() {
        
        return $this->hasOne(Profile::class);
    }

    // this function creates a basic title when the user is created, by firing
    protected static function boot() {
        parent::boot(); 

        static::created(function ($user) {
            $user->profile()->create([
                'nickname' => null,
                'job_title' => null,
                'job_date' => null,
                'work' => null,
                'appeal' => null
            ]);
        });
    }
}

