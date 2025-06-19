<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'answer',
    ];

    public function comment_id(): HasOne
    {
        return $this->hasOne(Comment::class);
    }
}
