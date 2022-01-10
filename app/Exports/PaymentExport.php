<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentExport implements FromQuery, WithHeadings
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
        return Payment::query()
        ->join('reservations','payments.reservation_id','=','reservations.id')
        ->select('check_in','invoice', 'payment_type', 'payment_status','amount')
        ->whereBetween('check_in', [$this->awal, $this->akhir])
        ->orderBy('check_in','asc');
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Invoice',
            'Payment Type',
            'Payment Status',
            'Pendapatan'
        ];
    }
}
