<?php

namespace App\Models;

use App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'user_id', 'equipment_type', 'make_and_model', 'reach', 'quantity', 'notes'
    ];
    protected $dates = ['deleted_at'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
