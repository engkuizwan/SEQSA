<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $table = 'project';
    protected $fillable = [
        'projectID','project_name', 'project_description', 'project_framework',
    ];
}
