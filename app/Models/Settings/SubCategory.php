<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Settings\SubCategory
 *
 * @property int $id
 * @property string $title
 * @property int|null $category_id
 * @property int|null $factory_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Settings\Category|null $category
 * @property-read mixed $category_name
 * @property-read mixed $code
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|SubCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereFactoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|SubCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SubCategory withoutTrashed()
 * @mixin \Eloquent
 */
class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'product_unit_price',
        'status',
        'category_id',
        'factory_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $appends = [
        'category_name',
        'code'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->title ?? '';
    }

    public function getCodeAttribute()
    {
        //return str_pad($this->id, 6, '0', STR_PAD_LEFT).str_pad($this->category->id, 6, '0', STR_PAD_LEFT);
    }
}
