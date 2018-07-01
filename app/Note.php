<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Note extends Model
{
    protected $table = 'note';
    protected $fillable = [
        'title', 'content', 'createdBy', 'editedBy'
    ];
    use HasTags;
}
