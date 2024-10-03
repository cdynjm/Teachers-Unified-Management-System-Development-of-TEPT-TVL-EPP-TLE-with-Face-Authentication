<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProMeds extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'promeds';

    protected $fillable = [
        'elemSubjectID',
        'hsSubjectID',
        'shsSubjectID',
        'tleID',
        'strandID',
        'grade',
        'yearLevel',
        'semester',
        'quarter',
        'section',
        'mps',
        'students',
        'out1',
        'out2',
        'out3',
        'very',
        'sat',
        'fair',
        'didnot',
        'atrisk',
        'average'
    ];
}
