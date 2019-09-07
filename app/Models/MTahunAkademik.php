<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MTahunAkademik extends Model
{
    protected $table = 'tahun_akademik';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'name',
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
        'password',
    ];

}
