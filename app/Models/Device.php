<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = ['token', 'name', 'user_id'];

    public function deviceData()
    {
        return $this->hasMany(DeviceData::class);
    }
}
