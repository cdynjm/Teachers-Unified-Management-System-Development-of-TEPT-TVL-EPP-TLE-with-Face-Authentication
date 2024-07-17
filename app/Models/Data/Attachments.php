<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\Teachers;

class Attachments extends Model
{
    use HasFactory;

    protected $table = "attachments";

    protected $fillable = [
        'elemSchoolID',
        'highSchoolID',
        'requestID',
        'teacherID',
        'filename'
    ];

    public function elemTeachers() {
        return $this->hasOne(Teachers::class, 'id', 'elemSchoolID');
    }

    public function highSchoolTeachers() {
        return $this->hasOne(Teachers::class, 'id', 'highSchoolID');
    }
}
