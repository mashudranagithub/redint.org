<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyAreas extends Model
{
    use HasFactory;

    protected $table = 'study_areas';

    protected $fillable = [
        'name',
        'banner',
    ];
}
