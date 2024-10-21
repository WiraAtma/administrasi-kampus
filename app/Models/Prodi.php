<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prodi extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='prodi';
    protected $fillable=[
        'name',
        'fakultas_id'
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id' );
    }
    
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
