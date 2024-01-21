<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:F d, Y H:m'
    ];

    protected static function booted()
    {
        static::addGlobalScope('user_owned_scope', function (Builder $query) {
            if (auth()->user()?->hasPermissionTo('view-owned-loans')) {
                $query->where('user_id', auth()->user()->id);
            }
        });
    }
}
