<?php

namespace App\Models;
use App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class W9Submission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "file_path",
    ];

    protected $dates = ['deleted_at'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
