<?php

namespace App\Models;
use App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ServiceFee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'concrete_fee', 'rebar_fee', 'survey_fee', 'permit_staff_fee_per_hour', 'neon_fee_per_unit', 
        'backhoe_fee_minimum', 'auger_fee_minimum', 'industrial_crane_fee_minimum', 'high_risk_staging_fee',
        'truck_one_technician_fee_per_hour', 'truck_two_technician_fee_per_hour'
    ];
    protected $dates = ['deleted_at'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
