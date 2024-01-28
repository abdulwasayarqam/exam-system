<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'dept_id'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }


    public function papers()
    {
        return $this->hasMany(Paper::class);
    }
}
