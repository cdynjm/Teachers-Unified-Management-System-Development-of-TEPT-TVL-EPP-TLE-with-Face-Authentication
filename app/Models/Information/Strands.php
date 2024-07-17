<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strands extends Model
{
    use HasFactory;

    protected $table = 'strand_subjects';

    protected $fillable = [
        'subject',
        'yearLevel',
        'semester'
    ];
}
