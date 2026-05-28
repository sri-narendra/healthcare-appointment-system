@extends('layouts.app')

@section('title', 'Home - Healthcare Appointment System')

@section('content')

<div class="relative overflow-hidden bg-gradient-to-br from-sky-50 via-white to-sky-100">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-12 sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32">
            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-sky-100 text-sky-700 mb-6">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 0 0 1.745-.723 3.066 3.066 0 0 1 3.976 0 3.066 3.066 0 0 0 1.745.723 3.066 3.066 0 0 1 2.01 2.01 3.066 3.066 0 0 0 .723 1.745 3.066 3.066 0 0 1 0 3.976 3.066 3.066 0 0 0-.723 1.745 3.066 3.066 0 0 1-2.01 2.01 3.066 3.066 0 0 0-1.745.723 3.066 3.066 0 0 1-3.976 0 3.066 3.066 0 0 0-1.745-.723 3.066 3.066 0 0 1-2.01-2.01 3.066 3.066 0 0 0-.723-1.745 3.066 3.066 0 0 1 0-3.976 3.066 3.066 0 0 0 .723-1.745 3.066 3.066 0 0 1 2.01-2.01Z" clip-rule="evenodd" />
                        </svg>
                        Trusted by 1000+ patients
                    </div>
                    <h1 class="text-4xl tracking-tight font-extrabold text-slate-900 sm:text-5xl md:text-6xl">
                        <span class="block">Your Health,</span>
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-cyan-600">Our Priority</span>
                    </h1>
                    <p class="mt-4 text-base text-slate-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-6 md:text-xl lg:mx-0 leading-relaxed">
                        Book appointments with trusted healthcare professionals quickly and easily.
                        No more waiting in long queues. Your well-being is just a click away.
                    </p>
                    <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row gap-4 sm:justify-center lg:justify-start">
                        <a href="{{ route('appointment.create') }}" class="inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-medium rounded-xl shadow-sm text-white bg-gradient-to-r from-sky-500 to-cyan-600 hover:from-sky-600 hover:to-cyan-700 transition-all duration-200 md:py-4 md:text-lg md:px-10">
                            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                            </svg>
                            Book Appointment
                        </a>
                        <a href="#features" class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-slate-300 text-base font-medium rounded-xl text-slate-700 hover:border-sky-400 hover:text-sky-600 transition-all duration-200 md:py-4 md:text-lg md:px-10">
                            Learn More
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="absolute -bottom-1 left-0 right-0 h-16 bg-gradient-to-t from-slate-50 to-transparent"></div>
</div>

<section id="features" class="py-16 sm:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto">
            <h2 class="text-3xl font-bold text-slate-900">Why Choose Us?</h2>
            <p class="mt-3 text-lg text-slate-500">We make healthcare accessible and convenient for everyone.</p>
        </div>
        <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div class="group relative bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md hover:border-sky-200 transition-all duration-200">
                <div class="w-12 h-12 bg-sky-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-sky-200 transition-colors">
                    <svg class="w-6 h-6 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">Easy Booking</h3>
                <p class="mt-2 text-sm text-slate-500 leading-relaxed">Book your appointment online in just a few clicks. Choose your preferred doctor, date, and time.</p>
            </div>

            <div class="group relative bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md hover:border-sky-200 transition-all duration-200">
                <div class="w-12 h-12 bg-sky-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-sky-200 transition-colors">
                    <svg class="w-6 h-6 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">Expert Doctors</h3>
                <p class="mt-2 text-sm text-slate-500 leading-relaxed">Choose from a wide range of qualified specialists with years of experience in their fields.</p>
            </div>

            <div class="group relative bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md hover:border-sky-200 transition-all duration-200">
                <div class="w-12 h-12 bg-sky-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-sky-200 transition-colors">
                    <svg class="w-6 h-6 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">Save Time</h3>
                <p class="mt-2 text-sm text-slate-500 leading-relaxed">No more waiting in long queues. Schedule your visit and get seen at your preferred time.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-16 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl font-bold text-slate-900">Ready to get started?</h2>
        <p class="mt-2 text-slate-500">Book your appointment today and take the first step towards better health.</p>
        <a href="{{ route('appointment.create') }}" class="inline-flex items-center mt-6 px-6 py-3 border border-transparent text-base font-medium rounded-xl shadow-sm text-white bg-sky-500 hover:bg-sky-600 transition-all duration-200">
            Book Your Appointment
            <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>
</section>

@endsection
