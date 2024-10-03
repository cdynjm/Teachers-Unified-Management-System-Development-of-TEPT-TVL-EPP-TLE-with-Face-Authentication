<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TLETVESubjects extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'tle_tve_subjects';

    protected $fillable = [
        'subject',
        'yearLevel'
    ];
}
