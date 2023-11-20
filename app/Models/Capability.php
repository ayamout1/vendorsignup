<?php

namespace App\Models;

use App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capability extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'geographic_service_area_miles',
        'no_mileage_charge_area_miles',
        'service_response_time_in_service_area',
        'service_response_time_in_no_charge_area',
        'workmanship_warranty',
        'supplies_materials_warranty',
        'standard_markup_percentage',
        'vehicles_fully_equipped',
        'special_notes'
    ];

    /**
     * Get the user that owns the capability.
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
