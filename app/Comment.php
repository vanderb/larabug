<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['issue_id', 'user_id', 'comment'];

    public function issue() {
        return $this->belongsTo(Issue::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
