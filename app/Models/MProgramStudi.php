<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MProgramStudi extends Model
{
    protected $table = 'program_studi';
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
