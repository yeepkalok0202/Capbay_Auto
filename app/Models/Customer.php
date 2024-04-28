<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $primaryKey = 'appointment_id';

    public function appointment()
    {
        return $this->hasOne(TestDriveAppointment::class, 'appointment_id', 'appointment_id');
    }
}
