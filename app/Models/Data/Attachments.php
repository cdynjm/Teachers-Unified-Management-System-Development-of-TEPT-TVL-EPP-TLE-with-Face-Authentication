<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\Teachers;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachments extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "attachments";

    protected $fillable = [
        'elemSchoolID',
        'highSchoolID',
        'requestID',
        'teacherID',
        'filename'
    ];

    public function elemTeachers() {
        return $this->hasOne(Teachers::class, 'id', 'elemSchoolID')->withTrashed();
    }

    public function highSchoolTeachers() {
        return $this->hasOne(Teachers::class, 'id', 'highSchoolID')->withTrashed();
    }
}
