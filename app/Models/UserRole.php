<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserRole
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserRole onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole query()
 * @method static \Illuminate\Database\Query\Builder|UserRole withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserRole withoutTrashed()
 * @mixin \Eloquent
 */
class UserRole extends Model
{
    use SoftDeletes;

    protected $table = 'user_role'; 
	
    protected $fillable = [
    	'user_id',
    	'role_id'
    ];

    protected $dates = [
    	'deleted_at'
    ];
}
