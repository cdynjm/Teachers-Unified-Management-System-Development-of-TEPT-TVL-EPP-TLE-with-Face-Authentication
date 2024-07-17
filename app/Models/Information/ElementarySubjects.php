<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementarySubjects extends Model
{
    use HasFactory;

    protected $table = 'elementary_subjects';

    protected $fillable = [
        'subject',
        'yearLevel',

    ];
}
