<?php

namespace App\Rules;

use App\Models\Invoice;
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
            (strtotime(date('H:i:s', time() + 5 * 60)) <= strtotime($this->serviceTime)
                or date('Y:m:d') != request('date'))
            and
            strtotime(sum_to_time($this->serviceTime, $this->duration)) <= strtotime(self::$endTime)
            and
            $this->notReserved();
    }

    public function notReserved(): bool
    {
        $date = request('date');
        $startTime = request('start_time');
        $endTime = Service::getEndTime($startTime);

        return Invoice::countOfConflictedInvoice($date, $startTime, $endTime) <= 1;
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
