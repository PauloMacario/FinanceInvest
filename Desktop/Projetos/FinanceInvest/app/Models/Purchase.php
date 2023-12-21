<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'segment_id',
        'shopper_id',
        'date',
        'description',
        'trade_name',
        'value',
        'number_installments',
        'processing_day',
        'payday',
        'status',
    ];

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }

    public function shopper()
    {
        return $this->belongsTo(Shopper::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }
}
