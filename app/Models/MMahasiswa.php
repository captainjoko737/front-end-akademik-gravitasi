<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MMahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'nim',
        'password',    
        'nama',    
        'email',   
        'alamat',  
        'nomor_hp',    
        'tempat_lahir',    
        'tanggal_lahir',   
        'status',  
        'program_studi',   
        'semester',    
        'angkatan',    
        'tahun_akademik',  
        'kelas',   
        'status_pembayaran',   
        'provinsi',    
        'kota',    
        'kecamatan',   
        'status_login',    
        'photo',   
        'last_login',  
        'created_by',  
        'updated_by',
        'created_at', 
        'updated_at'
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
