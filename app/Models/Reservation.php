<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'reservation_services', 'reservation_id', 'service_id');
    }

    
}
