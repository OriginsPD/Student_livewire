<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhoneNumbers extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        's_id',
        'phone_nbr'
    ];

    public function Students(): BelongsTo
    {
        return $this->belongsTo(Student::class);

    }
}
