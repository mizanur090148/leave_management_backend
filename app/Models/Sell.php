<?php

namespace App\Models;

use App\Models\Settings\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * App\Models\Sell
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Sell newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sell newQuery()
 * @method static \Illuminate\Database\Query\Builder|Sell onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Sell query()
 * @method static \Illuminate\Database\Query\Builder|Sell withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Sell withoutTrashed()
 * @mixin \Eloquent
 */
class Sell extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_no',
        'code',
        'sub_category_id',
        'unit_price',
        'quantity',
        'status',
        'factory_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $appends = [
        'category_name',
        'sub_category_name'
    ];

    protected $casts = [
        'sub_category_id' => 'int'
    ];

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function sells()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function getCategoryNameAttribute()
    {
        return $this->subCategory->category->title ?? '';
    }

    public function getSubCategoryNameAttribute()
    {
        return $this->subCategory->title ?? '';
    }
}
