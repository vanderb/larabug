<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['full_name', 'issue_progress'];

    public function issues() {
        return $this->hasMany(Issue::class, 'assignee_id');
    }

    public function getFullNameAttribute() {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getIssueProgressAttribute() {
        return $this->issues->sum('progress') / $this->issues->count();
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

}
