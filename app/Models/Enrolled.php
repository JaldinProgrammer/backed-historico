<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolled extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'grade',
        'subject_id',
        'semester_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function semester(){
        return $this->belongsTo('App\Models\Semester');
    }
    public function subject(){
        return $this->belongsTo('App\Models\Subject');
    }
}
