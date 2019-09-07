<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MKRS extends Model
{
    protected $table = 'krs';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'program_studi',
        'kode_matakuliah',
        'semester',
        'angkatan',
        'tahun_akademik',
        'dosen',
        'waktu',
        'hari',
        'pertemuan',
        'created_by',
        'updated_by',
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
