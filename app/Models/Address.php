<?php

namespace App\Models;

use App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'address', 'address2', 'city', 'state', 'postal', 'country', 'address_type'
    ];

    protected $dates = ['deleted_at'];
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
