<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use App\Models\Media;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function reservation(){
        return $this->hasOne(Reservation::class);
    }

    public function media(){
        return $this->hasMany(Media::class);
    }
    
}
