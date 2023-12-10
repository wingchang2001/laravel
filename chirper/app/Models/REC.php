<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class REC extends Model
{
    use HasFactory;

    protected $fillable = [
        'period_production',
        'start_date',
        'end_date',
        'device_id',
        // Add other attributes as needed
    ];

    protected $dates = ['start_date', 'end_date'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
