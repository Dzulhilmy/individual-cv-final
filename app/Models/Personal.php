<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personals';

    protected $fillable = [
        'name',
        'job_title',
        'email',
        'phone',
        'address',
        'summary',
        'image',
        'education',     // New
        'experience',    // New
        'awards',        // New
        'skills',        // New
        'ref1_name', 'ref1_job', 'ref1_contact', // Ref 1
        'ref2_name', 'ref2_job', 'ref2_contact',  // Ref 2
    ];
}
