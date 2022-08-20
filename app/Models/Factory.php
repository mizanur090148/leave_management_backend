<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Group;

/**
 * App\Models\Factory
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property string|null $responsible_person
 * @property string|null $email
 * @property string|null $mobile_no
 * @property int|null $group_id
 * @property string|null $logo
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Group|null $group
 * @method static \Illuminate\Database\Eloquent\Builder|Factory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Factory newQuery()
 * @method static \Illuminate\Database\Query\Builder|Factory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Factory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereMobileNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereResponsiblePerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Factory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Factory withoutTrashed()
 * @mixin \Eloquent
 */
class Factory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    	'name',
    	'address',
    	'responsible_person',
    	'email',
    	'mobile_no',
        'logo'
    ];

    protected $dates = [
    	'deleted_at'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
