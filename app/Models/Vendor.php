<?php

namespace App\Models;

Use App\Models\Address;
Use App\Models\AgreementForm;
Use App\Models\Capability;
Use App\Models\Equipment;
Use App\Models\Insurance;
Use App\Models\ServiceFee;
Use App\Models\W9Submission;
Use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'vendor_name', 'owner_name', 'owner_phone', 'vendor_type', 'vendor_phone',
        'vendor_fax', 'vendor_email', 'vendor_website', 'vendor_phone_extension'
    ];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
}

public function address()
{
    return $this->hasMany(Address::class);
}

public function agreementForm()
{
    return $this->hasOne(AgreementForm::class);
}


public function equipment()
{
    return $this->hasOne(Equipment::class);
}

public function serviceFee()
{
    return $this->hasOne(ServiceFee::class);
}

public function insurance()
{
    return $this->hasOne(Insurance::class);
}
public function capability()
{
    return $this->hasOne(Capability::class);
}

public function w9Submission()
{
    return $this->hasOne(w9Submission::class);
}
public function contacts()
{
    return $this->hasMany(Contact::class);
}


}
