<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\Pure;

/**
 * App\Models\Service
 *
 * @property int $id
 * @property string $name
 * @property string $cost
 * @property string $duration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ServiceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service extends Model
{
    use HasFactory;


    protected $guarded = [];

    public static function getEndTime(string $startTime): string
    {
        return sum_to_time($startTime, Service::find(request('service_id'))->duration);
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }
}

