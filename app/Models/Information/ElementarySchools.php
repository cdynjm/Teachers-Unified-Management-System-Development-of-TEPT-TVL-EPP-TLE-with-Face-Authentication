<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class ElementarySchools extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'elementary_schools';

    protected $fillable = [
        'school',
        'latitude',
        'longitude'
    ];

    public function User() {
        return $this->hasOne(User::class, 'elemschoolID', 'id')->withTrashed();
    }
}
