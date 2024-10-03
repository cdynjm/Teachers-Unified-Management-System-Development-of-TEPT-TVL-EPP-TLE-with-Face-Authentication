<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\ElementarySchools;
use App\Models\Information\ElementarySubjects;
use Illuminate\Database\Eloquent\SoftDeletes;

class ElementarySubjectsData extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        return $this->hasOne(ElementarySchools::class, 'id', 'schoolID')->withTrashed();
    }

    public function ElementarySubjects() {
        return $this->hasOne(ElementarySubjects::class, 'id', 'subjectID')->withTrashed();
    }
}
