<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReservationExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function awal(string $awal)
    {
        $this->awal = $awal;
        
        return $this;
    }

    public function akhir(string $akhir)
    {
        $this->akhir = $akhir;
        
        return $this;
    }
    
    public function query()
    {
        return Reservation::query()
        ->join('users','reservations.user_id','=','users.id')
        ->join('rooms','reservations.room_id','=','rooms.id')
        ->select('book_code', 'check_in', 'check_out', 'rooms.room_name', 'users.name', 'users.phone', 'users.email', 'users.address', 'guest_count', 'reservation_status')
        ->whereBetween('check_in', [$this->awal, $this->akhir])
        ->orderBy('check_in','asc');
    }

    public function headings(): array
    {
        return [
            'Invoice',
            'Check In',
            'Check Out',
            'Room Name',
            'Guest Name',
            'Phone',
            'Email',
            'Address',
            'Number of Guest',
            'Reservation Status'
        ];
    }
}
