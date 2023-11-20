<?php

namespace App\Models;
use App\Models\Vendor;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insurance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'vehicle_file', 'vehicle_effective_date', 'vehicle_expiration_date', 'general_liability_file',
        'general_effective_date', 'general_expiry_date', 'worker_file', 'worker_effective_date', 'worker_expiry_date'
    ];

    protected $dates = ['deleted_at'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
