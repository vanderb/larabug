<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = ['name', 'due_date', 'description'];

    protected $dates = ['due_date'];

    public function issues() {
        return $this->hasMany(Issue::class);
    }
}
