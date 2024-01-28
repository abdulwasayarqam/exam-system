<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = ['subject_id', 'title'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_paper', 'paper_id', 'user_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
