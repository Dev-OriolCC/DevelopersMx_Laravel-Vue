<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    // use HasFactory;
    protected $fillable = ['id', 'username', 'profile_pic', 'bio', 'location', 'description', 
        'experience', 'social_github', 'social_twitter', 'type_id'];

    public $incrementing = false;

    public function user(){
        return $this->hasOne(User::class);
    }

    public function skills(){
        return $this->hasMany(Skill::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function type_developer(){
        return $this->belongsTo(TypeDeveloper::class, 'type_id');
    }

}
