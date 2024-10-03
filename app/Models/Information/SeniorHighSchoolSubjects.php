<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeniorHighSchoolSubjects extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'senior_high_school_subjects';

    protected $fillable = [
        'subject',
        'yearLevel',
        'semester'
        
    ];
}
