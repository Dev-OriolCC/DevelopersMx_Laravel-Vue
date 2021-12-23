<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // use HasFactory;
    public $incrementing = false;

    protected $fillable = ['name', 'company_name', 'password', 'description', 'company_image', 'social_email', 'social_linkedin', 'location'];

    public function jobs(){
        return $this->hasMany(Job::class);
    }



}
