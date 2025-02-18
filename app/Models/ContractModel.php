<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractModel extends Model
{
    use HasFactory;

    protected $table = 'contract_models';

    protected $fillable = [
        'name',
        'content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}