@extends('layouts.app')

@section('title', 'Book Appointment')

@section('content')

<div class="max-w-3xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Book an Appointment</h1>
        <p class="mt-2 text-slate-500">Fill in the details below to schedule your visit with a specialist.</p>
    </div>

    @if (session('success'))
        <div class="flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3.5 rounded-xl mb-6">
            <svg class="w-5 h-5 text-emerald-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-800 px-4 py-3.5 rounded-xl mb-6">
            <svg class="w-5 h-5 text-red-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
            </svg>
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow-sm border border-slate-200 rounded-2xl p-6 sm:p-8">
        <form action="{{ route('appointment.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="patient_name" class="block text-sm font-medium text-slate-700 mb-1.5">Patient Name</label>
                    <input type="text" name="patient_name" id="patient_name" value="{{ old('patient_name') }}" required
                        class="block w-full border border-slate-300 rounded-lg shadow-sm py-2.5 px-3.5 text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-shadow">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="block w-full border border-slate-300 rounded-lg shadow-sm py-2.5 px-3.5 text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-shadow">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-slate-700 mb-1.5">Phone Number</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                        class="block w-full border border-slate-300 rounded-lg shadow-sm py-2.5 px-3.5 text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-shadow">
                </div>
                <div>
                    <label for="doctor_id" class="block text-sm font-medium text-slate-700 mb-1.5">Doctor</label>
                    <select name="doctor_id" id="doctor_id" required
                        class="block w-full border border-slate-300 rounded-lg shadow-sm py-2.5 px-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-shadow">
                        <option value="">-- Select Doctor --</option>
                        @forelse ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->doctor_name }} ({{ $doctor->specialization }})
                            </option>
                        @empty
                            <option value="" disabled>No doctors available currently.</option>
                        @endforelse
                    </select>
                </div>
            </div>

            <div>
                <label for="disease" class="block text-sm font-medium text-slate-700 mb-1.5">Disease / Problem Description</label>
                <textarea name="disease" id="disease" rows="3" required
                    class="block w-full border border-slate-300 rounded-lg shadow-sm py-2.5 px-3.5 text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-shadow" placeholder="Briefly describe your symptoms or reason for visit...">{{ old('disease') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="appointment_date" class="block text-sm font-medium text-slate-700 mb-1.5">Appointment Date</label>
                    <input type="date" name="appointment_date" id="appointment_date" value="{{ old('appointment_date') }}" required
                        class="block w-full border border-slate-300 rounded-lg shadow-sm py-2.5 px-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-shadow">
                </div>
                <div>
                    <label for="appointment_time" class="block text-sm font-medium text-slate-700 mb-1.5">Appointment Time</label>
                    <input type="time" name="appointment_time" id="appointment_time" value="{{ old('appointment_time') }}" required
                        class="block w-full border border-slate-300 rounded-lg shadow-sm py-2.5 px-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-shadow">
                </div>
            </div>

            <button type="submit"
                class="w-full flex items-center justify-center gap-2 py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-sky-500 to-cyan-600 hover:from-sky-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition-all duration-200">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Confirm Appointment
            </button>
        </form>
    </div>
</div>

@endsection
