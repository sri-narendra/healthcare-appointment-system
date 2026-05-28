<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Healthcare Appointment System</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 font-sans antialiased">

    <nav class="bg-white shadow-sm border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="{{ route('admin') }}" class="flex items-center space-x-2">
                    <svg class="w-6 h-6 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38a.402.402 0 0 1-.568-.41 25.076 25.076 0 0 1 0-8.728.402.402 0 0 1 .568-.41l.657.38c.289.167.502.458.543.826.025.232.046.465.06.698Z" />
                    </svg>
                    <span class="text-lg font-bold text-slate-800">Admin Panel</span>
                </a>
                <div class="flex items-center gap-2">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="text-slate-600 hover:text-red-600 hover:bg-red-50 px-3 py-2 rounded-lg text-sm font-medium transition-colors inline-flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                            </svg>
                            Logout
                        </button>
                    </form>
                    <a href="{{ route('home') }}" class="text-slate-600 hover:text-sky-600 hover:bg-sky-50 px-3 py-2 rounded-lg text-sm font-medium transition-colors">Back to Home</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3.5 rounded-xl mb-6">
                <svg class="w-5 h-5 text-emerald-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="space-y-8">

            {{-- Doctor Management --}}
            <div class="bg-white shadow-sm border border-slate-200 rounded-2xl overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-100">
                    <h2 class="text-xl font-bold text-slate-900">Doctor Management</h2>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.doctors.store') }}" method="POST" class="flex flex-col sm:flex-row gap-3 mb-6 pb-6 border-b border-slate-100">
                        @csrf
                        <div class="flex-1">
                            <input type="text" name="doctor_name" id="doctor_name" required placeholder="Doctor name"
                                class="w-full border border-slate-300 rounded-lg shadow-sm py-2 px-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                        </div>
                        <div class="flex-1">
                            <input type="text" name="specialization" id="specialization" required placeholder="Specialization"
                                class="w-full border border-slate-300 rounded-lg shadow-sm py-2 px-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                        </div>
                        <button type="submit"
                            class="shrink-0 inline-flex items-center gap-1.5 bg-sky-500 text-white px-5 py-2 rounded-lg hover:bg-sky-600 transition text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add Doctor
                        </button>
                    </form>

                    <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-3">Existing Doctors</h3>

                    @forelse ($doctors as $doctor)
                        <div class="bg-slate-50 rounded-xl p-4 mb-2.5 border border-slate-200">
                            <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="flex flex-col sm:flex-row gap-3 items-start sm:items-end">
                                    <div class="flex-1 w-full">
                                        <label class="block text-xs text-slate-500 mb-1">Doctor Name</label>
                                        <input type="text" name="doctor_name" value="{{ $doctor->doctor_name }}" required
                                            class="w-full border border-slate-300 rounded-lg py-1.5 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                                    </div>
                                    <div class="flex-1 w-full">
                                        <label class="block text-xs text-slate-500 mb-1">Specialization</label>
                                        <input type="text" name="specialization" value="{{ $doctor->specialization }}" required
                                            class="w-full border border-slate-300 rounded-lg py-1.5 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                                    </div>
                                    <div class="flex gap-2 shrink-0">
                                        <button type="submit"
                                            class="inline-flex items-center gap-1 bg-amber-500 text-white px-3 py-1.5 rounded-lg text-sm hover:bg-amber-600 transition">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                            Update
                                        </button>
                                        <a href="{{ route('admin.doctors.delete', $doctor->id) }}"
                                            onclick="event.preventDefault(); if(confirm('Delete this doctor?')) { document.getElementById('delete-doctor-{{ $doctor->id }}').submit(); }"
                                            class="inline-flex items-center gap-1 bg-red-500 text-white px-3 py-1.5 rounded-lg text-sm hover:bg-red-600 transition cursor-pointer">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <form id="delete-doctor-{{ $doctor->id }}" action="{{ route('admin.doctors.delete', $doctor->id) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    @empty
                        <div class="text-center py-8 text-slate-400">
                            <svg class="w-10 h-10 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <p class="text-sm">No doctors added yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Appointment Management --}}
            <div class="bg-white shadow-sm border border-slate-200 rounded-2xl overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-slate-900">Appointment Management</h2>
                    <span class="text-xs text-slate-400">Sorted by date &amp; time</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="text-left px-6 py-3 font-semibold text-slate-600">Patient</th>
                                <th class="text-left px-6 py-3 font-semibold text-slate-600">Doctor</th>
                                <th class="text-left px-6 py-3 font-semibold text-slate-600">Disease</th>
                                <th class="text-left px-6 py-3 font-semibold text-slate-600">Date</th>
                                <th class="text-left px-6 py-3 font-semibold text-slate-600">Time</th>
                                <th class="text-right px-6 py-3 font-semibold text-slate-600">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($appointments as $appointment)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-slate-900">{{ $appointment->patient_name }}</div>
                                        <div class="text-xs text-slate-400">{{ $appointment->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-700">{{ $appointment->doctor_name }}</td>
                                    <td class="px-6 py-4 text-slate-700 max-w-[200px] truncate" title="{{ $appointment->disease }}">{{ $appointment->disease }}</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1 text-slate-700">
                                            <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                            </svg>
                                            {{ $appointment->appointment_date }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1 text-slate-700">
                                            <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ $appointment->appointment_time }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <form action="{{ route('admin.appointments.delete', $appointment->id) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Delete appointment for {{ $appointment->patient_name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 hover:bg-red-50 px-2.5 py-1.5 rounded-lg transition text-xs font-medium">
                                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                        <svg class="w-10 h-10 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                        </svg>
                                        <p class="text-sm">No appointments booked yet.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
