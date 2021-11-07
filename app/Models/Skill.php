<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    // use HasFactory;
    public $incrementing = false;
    protected $fillable = ['name', 'description', 'developer_id'];

    public function developer(){
        return $this->belongsTo(Developer::class);
    }


}
