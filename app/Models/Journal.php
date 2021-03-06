<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Journal extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'lessons_id',
        'student_id',
        'mark'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lessons::class, 'lessons_id');
    }


    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}

