<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\Strands;
use App\Models\Information\HighSchools;
use App\Models\Information\SeniorHighSchoolSubjects;

class SeniorHighSchoolSubjectsData extends Model
{
    use HasFactory;

    protected $table = "senior_high_school_subjects_data";

    protected $fillable = [
        'schoolID',
        'yearLevel',
        'semester',
        'subjectID',
        'strand',
        'first',
        'second',
        'third',
        'fourth',
        'mps',
        'students',
        'year'
    ];

    public function HighSchools() {
        return $this->hasOne(HighSchools::class, 'id', 'schoolID');
    }
    public function SeniorHighSchoolSubjects() {
        return $this->hasOne(SeniorHighSchoolSubjects::class, 'id', 'subjectID');
    }
    public function Strands() {
        return $this->hasOne(Strands::class, 'id', 'subjectID');
    }
}
