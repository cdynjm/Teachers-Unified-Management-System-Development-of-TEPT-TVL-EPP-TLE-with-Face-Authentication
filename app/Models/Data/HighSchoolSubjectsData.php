<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\HighSchools;
use App\Models\Information\TLETVESubjects;

class HighSchoolSubjectsData extends Model
{
    use HasFactory;

    protected $table = "highschool_subjects_data";

    protected $fillable = [
        'schoolID',
        'yearLevel',
        'subjectID',
        'tve_tle',
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

    public function TLETVESubjects() {
        return $this->hasOne(TLETVESubjects::class, 'id', 'subjectID');
    }
}
