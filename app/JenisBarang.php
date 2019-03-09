<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    protected $table = 'jenisbarang';
    protected $primaryKey = 'jenis';
    public $timestamps = false;
    public $incrementing = false;
}
