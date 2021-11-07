<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // use HasFactory;
    public $incrementing = false;

    protected $fillable = ['developer_id', 'title', 'project_image', 'description', 'demo_link', 'repo_link'];


    public function developer(){
        $this->belongsTo(Developer::class);
    }

}
