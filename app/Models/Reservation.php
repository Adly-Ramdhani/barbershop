<?php

namespace App\Models;

use App\Models\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function services()
    {
        return $this->belongsToMany(Services::class, 'reservation_services', 'reservation_id', 'service_id');
    }
}
