<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController
{
    public function create()
    {
        $doctors = Doctor::all();
        return view('appointment', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'disease' => 'required|string|max:1000',
            'doctor_id' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string',
        ]);

        $doctor = Doctor::find($request->doctor_id);

        if (!$doctor) {
            return redirect()->route('appointment.create')->withErrors(['doctor_id' => 'Selected doctor not found.'])->withInput();
        }

        $exists = Appointment::where('doctor_id', $request->doctor_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->exists();

        if ($exists) {
            return redirect()->route('appointment.create')->withErrors([
                'appointment_time' => 'This appointment slot is already booked.'
            ])->withInput();
        }

        Appointment::create([
            'patient_name' => $request->patient_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'disease' => $request->disease,
            'doctor_id' => $request->doctor_id,
            'doctor_name' => $doctor->doctor_name,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
        ]);

        return redirect()->route('appointment.create')->with('success', 'Appointment booked successfully!');
    }
}
