<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Teachers extends Model
{
    use HasFactory;

    protected $table = "teachers";

    protected $fillable = [
        'schoolType',
        'elemSchoolID',
        'highSchoolID',
        'yearLevel',
        'subjectID',
        'teacher',
        'picture',
        'position'
    ];

    public function ElementarySchools() {
        return $this->hasOne(ElementarySchools::class, 'id', 'elemSchoolID');
    }
    public function HighSchools() {
        return $this->hasOne(HighSchools::class, 'id', 'highSchoolID');
    }
    public function User() {
        return $this->hasOne(User::class, 'teacherID', 'id');
    }
}
