<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\HighSchools;
use App\Models\Information\TLETVESubjects;
use App\Models\Information\HighSchoolSubjects;
use Illuminate\Database\Eloquent\SoftDeletes;

class HighSchoolSubjectsData extends Model
{
    use HasFactory;
    use SoftDeletes;
    
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
        return $this->hasOne(HighSchools::class, 'id', 'schoolID')->withTrashed();
    }
    public function HighSchoolSubjects() {
        return $this->hasOne(HighSchoolSubjects::class, 'id', 'subjectID')->withTrashed();
    }
    public function TLETVESubjects() {
        return $this->hasOne(TLETVESubjects::class, 'id', 'subjectID')->withTrashed();
    }
}
