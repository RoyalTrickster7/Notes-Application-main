<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Folder extends Model
{
    use HasFactory;

    protected $table = "folders";

    protected $fillable = [
        'name', 'color', 'user_id', 'categories_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function notes(): hasMany
    {
        return $this->hasMany(Note::class);
    }
}
