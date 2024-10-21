<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim',
        'name',
        'prodi_id',
        'gender',
        'phone',
        'email',
        'image'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
