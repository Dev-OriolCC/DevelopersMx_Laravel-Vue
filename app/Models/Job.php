<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // use HasFactory;
    public $incrementing = false;

    protected $fillable = ['id','company_id', 'type_id', 'title', 'description', 'location', 'level', 'schedule',
        'benefit_flexible', 'benefit_dress', 'benefit_medical', 'benefit_vacation'];

    public function company(){
        return $this->BelongsTo(Company::class);
    }

    public function type_developer(){
        return $this->BelongsTo(TypeDeveloper::class, 'type_id');
    }
}
