<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    // use HasFactory;
    use Notifiable;
    //? Changes made to this class for authentication.
    public $incrementing = false;

    protected $guard = "company";

    protected $fillable = ['id', 'name', 'company_name', 'password', 'description', 'company_image', 'social_email', 'social_linkedin', 'location'];

    protected $hidden = ['password'];

    public function jobs(){
        return $this->hasMany(Job::class);
    }



}
