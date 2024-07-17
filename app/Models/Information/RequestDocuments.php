<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Data\Attachments;

class RequestDocuments extends Model
{
    use HasFactory;

    protected $table = "request_documents";

    protected $fillable = [
        'position',
        'description'
    ];

    public function Attachments() {
        return $this->hasOne(Attachments::class, 'requestID', 'id');
    }
}
