<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestDriveAppointment extends Model
{

    protected $primaryKey="appointment_id";

    protected $fillable=['appointment_id','appointment_date','appointment_status','approval_date'];

    public function customer(){
        return $this->belongsTo(Customer::class,'appointment_id', 'appointment_id');
    }
}
