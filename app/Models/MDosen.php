<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MDosen extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'nidn', 
        'password', 
        'kode',
        'nama',
        'email', 
        'alamat',  
        'status', 
        'status_login', 
        'photo', 
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
        'password',
    ];

}
