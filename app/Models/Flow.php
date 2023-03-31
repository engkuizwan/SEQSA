<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flow extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'flow';
    protected $primarykey = 'flow_id';
    protected $fillable = [
        'flow_name','modul_id'
    ];

    public function scopeFilter ($query, $modul_id){

        return $query->where('modul_id',$modul_id)->latest();

    }
}
