<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'subject', 
        'description', 
        'percentage', 
        'resolved', 
        'priority', 
        'state',
        'project_id', 
        'category_id', 
        'milestone_id', 
        'creator_id', 
        'assignee_id'
    ];
    
    public function created_by() {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function assigned_to() {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    public function milestone() {
        return $this->belongsTo(Milestone::class);
    }
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
