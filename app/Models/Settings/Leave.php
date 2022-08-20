<?php

namespace App\Models\Settings;

use App\Models\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Settings\Leave
 *
 * @property int $id
 * @property int $casual
 * @property int $sick
 * @property int $annual
 * @property int $maternity
 * @property int $paternity
 * @property int $others
 * @property int $unpaid
 * @property string|null $year
 * @property int $factory_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Factory $factory
 * @method static \Database\Factories\Settings\LeaveFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Leave newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Leave query()
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereAnnual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereCasual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereFactoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereMaternity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereOthers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave wherePaternity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereSick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereUnpaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereYear($value)
 * @mixin \Eloquent
 */
class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'casual',
        'sick',
        'annual',
        'maternity',
        'paternity',
        'unpaid',
        'others',
        'year'
    ];

    public function factory()
    {
        return $this->belongsTo(Factory::class);
    }
}
