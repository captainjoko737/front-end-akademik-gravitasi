<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MMatakuliah extends Model
{
    protected $table = 'matakuliah';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'kode',
        'nama',
        'program_studi',
        'sks',
        'semester',
        'created_by',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
