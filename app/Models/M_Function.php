<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Function extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'function';
    protected $primaryKey = 'functionID';
    protected $fillable = [
        'function_name', 'functionDesc', 'userID', 'roleID', 'file_ID', 'status', 'created_at',
    ];

    public function scopeFilter($query, $fileID){
        return $query->where('file_ID',$fileID)->latest();
    }

    public static function getAllFunc($fileID){
        $sql = DB::table('function as f')
                ->leftJoin('users as u', 'f.userID', '=', 'u.id')
                ->leftJoin('file as f2', 'f.file_ID', '=', 'f2.file_ID')
                ->select('f.functionID', 'f.function_name' , 'f.functionDesc' , 'u.name' , 'f2.file_name' , 'f.created_at' )
                ->where('f.file_ID', '=', $fileID)
                ->where('f.deleted_at')
                ->get();

        return $sql;
    }

    public static function getFunc($functionID){
        $sql = DB::table('function as f')
                ->leftJoin('users as u', 'f.userID', '=', 'u.id')
                ->leftJoin('file as f2', 'f.file_ID', '=', 'f2.file_ID')
                ->select('f.functionID', 'f.function_name' , 'f.functionDesc' , 'u.name' , 'f2.file_ID' , 'f2.file_name' , 'f.created_at' )
                ->where('f.functionID', '=', $functionID)
                ->first();

        return $sql;
    }
}
