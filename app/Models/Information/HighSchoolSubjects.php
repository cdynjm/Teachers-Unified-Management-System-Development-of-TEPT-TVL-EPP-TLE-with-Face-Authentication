<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighSchoolSubjects extends Model
{
    use HasFactory;

    protected $table = 'highschool_subjects';

    protected $fillable = [
        'subject',
        'yearLevel',
        
    ];
}
