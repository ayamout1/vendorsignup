<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function vendor(): HasOne
    {
        return $this->hasOne(Vendor::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function insurance(): HasOne
    {
        return $this->hasOne(Insurance::class);
    }

    public function serviceInformation(): HasOne
    {
        return $this->hasOne(ServiceInformation::class);
    }

    public function feeInformation(): HasOne
    {
        return $this->hasOne(FeeInformation::class);
    }

    public function equipment(): HasOne
    {
        return $this->hasOne(Equipment::class);
    }

    public function w9Submission(): HasOne
    {
        return $this->hasOne(W9Submission::class);
    }

    public function agreementForm(): HasOne
    {
        return $this->hasOne(AgreementForm::class);
    }

}
