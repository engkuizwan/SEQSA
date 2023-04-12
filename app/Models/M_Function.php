<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_Function extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'function';
    protected $primaryKey = 'functionID';
    protected $fillable = [
        'function_name','userID', 'roleID', 'fileID', 'status'
    ];

    public function scopeFilter($query, $fileID){
        return $query->where('file_ID',$fileID)->latest();
    }
}
