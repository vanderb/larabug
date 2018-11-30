<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'state'];

    public function issues() {
        return $this->hasMany(Issue::class);
    }
}
