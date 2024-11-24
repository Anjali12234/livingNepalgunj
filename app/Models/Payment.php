<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'user_id',
        'transaction_id',
        'amount',
        'payment_method',
        'payment_status',
        'payment_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
