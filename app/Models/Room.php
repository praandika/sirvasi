<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function reservation(){
        return $this->hasOne(Reservation::class);
    }
}
