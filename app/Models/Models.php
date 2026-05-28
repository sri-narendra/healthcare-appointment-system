<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Doctor extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'doctors';
    protected $fillable = ['doctor_name', 'specialization'];
    public $timestamps = true;
}

class Appointment extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'appointments';
    protected $fillable = ['patient_name', 'email', 'phone', 'disease', 'doctor_id', 'doctor_name', 'appointment_date', 'appointment_time'];
    public $timestamps = true;
}
