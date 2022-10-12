<?php

namespace App\Rules;

use App\Models\Service;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ValidServiceTime implements Rule
{
    private static string $startTime = '09:00:00';
    private static string $endTime = '21:00:00';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(private string $serviceTime, private string $duration)
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return
            ($this->duration != 0 and $this->serviceTime != 0)
            and
            strtotime(sum_to_time($this->serviceTime, $this->duration)) <= strtotime(self::$endTime)
            and
            $this->notReserved();
    }

    public static function notReserved(): bool
    {
        return self::countOfInvoiceAtSelectedTime() <= 1;
    }

    public static function countOfInvoiceAtSelectedTime()
    {
        $date = request('date');
        $startTime = request('start_time');
        $endTime = sum_to_time(self::$startTime, Service::find(request('service_id'))->duration);

        /* write a query for request to DB and check invoices have conflict in this time */
        return get_object_vars(DB::select("
        select
         COUNT(i.id) as 'count'
        from
        invoices i
        where
        i.`date` = '$date'
        AND (
        i.start_time <= '$startTime' <= i.end_time
        or '$startTime' <= i.start_time <= '{$endTime}')
        ")[0])['count'];
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->duration != 0 ?
            'در زمان انتخاب شده قادر به انجام خدمت مورد نظر نمی باشیم' :
            'بدون انتخاب سرویس و تاریخ قادر به بررسی نمی باشیم';
    }

}
