<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLETVESubjects extends Model
{
    use HasFactory;

    protected $table = 'tle_tve_subjects';

    protected $fillable = [
        'subject',
        'yearLevel'
    ];
}
