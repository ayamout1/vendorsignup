<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
       'id','vendor_id','contact_name','contact_email','contact_phone','contact_position','contact_phone_extension'

    ];
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }


}
