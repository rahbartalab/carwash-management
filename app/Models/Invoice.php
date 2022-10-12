<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

/**
 * App\Models\Invoice
 *
 * @property int $id
 * @property int $service_id
 * @property string $phone_number
 * @property string $date
 * @property string $start_time
 * @property string $end_time
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\InvoiceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Invoice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public static function countOfConflictedInvoice(string $date, string $startTime, string $endTime): int
    {
        /* write a query for request to DB and check invoices have conflict in this time */
        return DB::table('invoices')
            ->where("date", $date)
            ->where(fn($query) => $query
                ->whereRaw("'$startTime' BETWEEN  start_time and end_time")
                ->orWhereRaw("start_time BETWEEN '$startTime' and '$endTime'")
            )->get()->count();
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public static function findNearestTime(array $attributes): array
    {
        date_default_timezone_set('Iran');
        $date = date('Y-m-d');
        $start_time = date('H:i:s', round(time() / 300) * 300);
        $nDay = 1;


        while (is_null($attributes['start_time'])) {
            $endTime = Service::getEndTime($start_time);

            /* can't find time today and try find at another day */
            if (overFlow($endTime)) {
                $start_time = '09:00:00';
                $date = date('Y-m-d', "+$nDay day");
                $nDay++;
            }


            /* we have empty stage and now we can break */
            if (Invoice::countOfConflictedInvoice($date, $start_time, $endTime) <= 1) {
                $attributes['start_time'] = $start_time;
                $attributes['end_time'] = $endTime;
                $attributes['date'] = $date;
                break;
            }

            $start_time = sum_to_time($start_time, '00:05:00');
        }


        return $attributes;
    }

}
