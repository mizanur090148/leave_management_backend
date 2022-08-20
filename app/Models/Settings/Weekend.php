<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Settings\Weekend
 *
 * @property int $id
 * @property string $weekend_days
 * @property int $factory_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend query()
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend whereFactoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend whereWeekendDays($value)
 * @mixin \Eloquent
 */
class Weekend extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekend_days',
        'factory_id',
    ];
}
