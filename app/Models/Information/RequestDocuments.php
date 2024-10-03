<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Data\Attachments;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestDocuments extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = "request_documents";

    protected $fillable = [
        'position',
        'description'
    ];

    public function Attachments() {
        return $this->hasOne(Attachments::class, 'requestID', 'id')->withTrashed();
    }
}
