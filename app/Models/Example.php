<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\HasFilter;
use App\Helpers\Cast;
use App\Models\User;

class Example extends Model
{
    use HasFactory, hasFilter;

    protected $table = 'example';
    protected $guarded = [];
    protected $casts = [
        'birth_date' => 'date',
        'number' => 'number',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    protected function number(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Cast::number($value),
            set: fn (string $value) => Cast::number($value),
        );
    }
}
