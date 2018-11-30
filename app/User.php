<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

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

    protected $appends = ['full_name', 'issue_progress', 'avatar'];

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

    public function getAvatarAttribute() {
        return'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $this->email ) ) ) . "?s=80&d=mp&r=g";
    }

}
