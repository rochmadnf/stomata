<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceData extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['device_id', 'filled', 'unfilled'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
