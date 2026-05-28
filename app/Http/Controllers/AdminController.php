<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->email === env('ADMIN_EMAIL') && $request->password === env('ADMIN_PASSWORD')) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin')->with('success', 'Welcome back, Admin!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }

    public function index()
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $doctors = Doctor::all();
        $appointments = Appointment::orderBy('appointment_date')->orderBy('appointment_time')->get();
        return view('admin', compact('doctors', 'appointments'));
    }

    public function storeDoctor(Request $request)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'doctor_name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        Doctor::create([
            'doctor_name' => $request->doctor_name,
            'specialization' => $request->specialization,
        ]);

        return redirect()->route('admin')->with('success', 'Doctor added successfully!');
    }

    public function updateDoctor(Request $request, $id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'doctor_name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update([
            'doctor_name' => $request->doctor_name,
            'specialization' => $request->specialization,
        ]);

        return redirect()->route('admin')->with('success', 'Doctor updated successfully!');
    }

    public function deleteDoctor($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin')->with('success', 'Doctor deleted successfully!');
    }

    public function deleteAppointment($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('admin')->with('success', 'Appointment deleted successfully!');
    }
}
