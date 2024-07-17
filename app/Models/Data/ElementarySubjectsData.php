<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\ElementarySchools;
use App\Models\Information\ElementarySubjects;

class ElementarySubjectsData extends Model
{
    use HasFactory;

    protected $table = "elementary_subjects_data";

    protected $fillable = [
        'schoolID',
        'yearLevel',
        'subjectID',
        'first',
        'second',
        'third',
        'fourth',
        'mps',
        'students',
        'year'
    ];

    public function ElementarySchools() {
        return $this->hasOne(ElementarySchools::class, 'id', 'schoolID');
    }

    public function ElementarySubjects() {
        return $this->hasOne(ElementarySubjects::class, 'id', 'subjectID');
    }
}
