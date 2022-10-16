<?php

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\Pure;

function sum_to_time($fTime, $sTime): string
{
    $secs = strtotime($sTime) - strtotime("00:00:00");
    return date("H:i:s", strtotime($fTime) + $secs);
}


function overFlow(string $endTime): bool
{
    return strtotime($endTime) > strtotime('21:00:00');
}


function generateCode(string $startTime, string $date): string
{
    return strtotime($startTime) . strtotime($date) . time();
}


function getEndTime($startTime, $services): string
{
    $duration = '00:00:00';
    foreach ($services as $service) {
        $duration = sum_to_time($duration, $service->duration);
    }

    return sum_to_time($startTime, $duration);
}

function saveInvoiceService($services, $invoice)
{
    $items = [];
    DB::table('invoice_service')->where('invoice_id', $invoice->id)->delete();
    foreach ($services as $service) {
        $items[] = [
            'invoice_id' => $invoice->id,
            'service_id' => $service->id
        ];
    }
    DB::table('invoice_service')->insert($items);
}
