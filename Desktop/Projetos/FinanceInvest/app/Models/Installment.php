<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'installment',
        'value',
        'paydate',
        'status',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
