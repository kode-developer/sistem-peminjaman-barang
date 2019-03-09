<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datapeminjaman extends Model
{
    protected $table = 'datapeminjaman';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
