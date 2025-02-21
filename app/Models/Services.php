<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Services extends Model
{    
    use SoftDeletes; // Tambahkan ini untuk mendukung Soft Delete

    protected $table = 'services';

    protected $fillable = [ // Gantilah $guarded dengan $fillable
        'name',
        'description',
    ];

}
