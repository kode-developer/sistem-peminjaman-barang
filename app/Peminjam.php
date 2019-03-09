<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = 'peminjam';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['nim', 'nama', 'telepon'];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = strtoupper($value);
    }


}
