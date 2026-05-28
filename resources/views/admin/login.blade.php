<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Healthcare Appointment System</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 font-sans antialiased min-h-screen flex items-center justify-center">

    <div class="w-full max-w-sm mx-4">
        <div class="bg-white shadow-sm border border-slate-200 rounded-2xl p-8">
            <div class="text-center mb-8">
                <div class="mx-auto w-12 h-12 bg-sky-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                </div>
                <h1 class="text-xl font-bold text-slate-900">Admin Login</h1>
                <p class="text-sm text-slate-500 mt-1">Enter your credentials to continue</p>
            </div>

            @if ($errors->any())
                <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                    <svg class="w-5 h-5 text-red-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                    <span>{{ $errors->first('email') }}</span>
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full border border-slate-300 rounded-lg shadow-sm py-2.5 px-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full border border-slate-300 rounded-lg shadow-sm py-2.5 px-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                </div>
                <button type="submit"
                    class="w-full bg-sky-500 text-white py-2.5 rounded-lg hover:bg-sky-600 transition text-sm font-medium">
                    Sign in
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-sky-600 transition">
                    &larr; Back to Home
                </a>
            </div>
        </div>
    </div>

</body>
</html>
