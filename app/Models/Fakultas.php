<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;
    protected $table = 'fakultas';
    /**
     * Get all of the comments for the Fakultas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }
}
