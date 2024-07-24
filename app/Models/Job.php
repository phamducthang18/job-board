<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public static array $experience =['entry', 'intermediate','senior'];

    public static array $category= [
        'IT',
        'Finance',
        'Marketing',
        'Healthcare',
        'Education',
        'Construction',
        'Retail',
        'Manufacturing',
        'Agriculture',
        'Real Estate',
        'Transportation',
        'Telecommunications',
        'Energy',
        'Natural Resources',
        'Services',
        'Hospitality',
        'Education',
        'Law',
        'Insurance',
        'Arts',
        'Sports',
        'Media',
        'Finance',
        'Banking',
        'Insurance',
        'Construction',
        'Real Estate',
        'Transportation',
        'Telecommunications',
        'Energy',
        'Natural Resources',
        'Services',
        'Hospitality',
        'Education',
        'Law',
        'Insurance',
        'Arts',
        'Sports',
        'Media',
    ];
}
