<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;


class Teachers extends Model
{
    use HasFactory;
    use SoftDeletes;
    
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
        return $this->hasOne(ElementarySchools::class, 'id', 'elemSchoolID')->withTrashed();
    }
    public function HighSchools() {
        return $this->hasOne(HighSchools::class, 'id', 'highSchoolID')->withTrashed();
    }
    public function User() {
        return $this->hasOne(User::class, 'teacherID', 'id')->withTrashed();
    }
}
