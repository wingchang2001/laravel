<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'registry_name',
        'registry_id',
        'capacity_mw',
        'fuel_type',
        'country',
        'province',
        'registry',
        'connected_to_grid',
        'feed_in_tariff',
        'percentage_renewable',
        'labelling_schemes',
        'latitude',
        'longitude',
        'registration_date',
        'commission_date',
        'address_local',
        'address_english',
        'device_type',
    ];   
    
    public function recs()
    {
        return $this->hasMany(REC::class);
    }
}
