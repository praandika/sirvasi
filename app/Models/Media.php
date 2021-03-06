<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Media extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
