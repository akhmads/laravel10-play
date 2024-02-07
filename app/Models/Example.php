<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\HasFilter;
use App\Models\User;

class Example extends Model
{
    use HasFactory, hasFilter;

    protected $table = 'example';
    protected $guarded = [];
    protected $casts = [
        'birth_date' => 'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
