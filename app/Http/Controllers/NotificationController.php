<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\Reservation;
use App\Notifications\NewReservationNotification;

class NotificationController extends Controller
{
    use Notifiable;
    
    public function index()
    {
        return view('product');
    }

    public function sendReservationNotification(){
        $data = Reservation::first();

        $reservation = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];

        Notification::send($data, new NewReservationNotification($reservation));
   
        dd('Task completed!');
    }
}
