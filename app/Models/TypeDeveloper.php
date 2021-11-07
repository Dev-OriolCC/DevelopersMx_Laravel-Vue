<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDeveloper extends Model
{
    // use HasFactory;
    public $incrementing = false;

    protected $table = 'type_developer';

    protected $fillable = ['name'];

    // ! Pending to check the inversion mode of this relationship
    // * Working aparrently....
    public function developers(){
        return $this->hasMany(Developer::class, 'type_id');
    }

    public function jobs(){
        return $this->hasMany(Job::class, 'type_id');
    }

}
