<?php

namespace App\Models;

use App\Notifications\EmployeeEmailVerificationNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, SoftDeletes, HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmployeeEmailVerificationNotification);
    }
}
