<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    protected $table = "notes";

    protected $fillable = [
        'title', 'content', 'subtitle', 'bookmark', 'user_id', 'folder_id'
    ];

    function folder(): belongsTo
    {
        return $this->belongsTo(Folder::class);
    }
}