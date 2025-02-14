<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $table='tenants';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'bank_account',
        // 'data_owner_id'
    ];

    // faire une relation avec contract
    // public function contracts()
    // {
    //     return $this->hasMany(Contract::class);
    // }
}
