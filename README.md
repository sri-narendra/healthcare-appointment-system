# Healthcare Appointment Booking System

A simple Laravel + MongoDB appointment booking system with TailwindCSS UI.

## Tech Stack

- **Backend:** Laravel 10
- **Database:** MongoDB (Atlas)
- **Frontend:** TailwindCSS (Blade templates)

## Project Structure

```
├── app/Http/Controllers/
│   ├── AdminController.php       # Login + CRUD for doctors & appointments
│   ├── AppointmentController.php # Patient booking
│   ├── HomeController.php
│   └── Controller.php
├── app/Models/
│   ├── Doctor.php
│   └── Appointment.php
├── config/database.php
├── resources/views/
│   ├── layouts/app.blade.php
│   ├── home.blade.php
│   ├── appointment.blade.php
│   ├── admin/
│   │   └── login.blade.php
│   └── admin.blade.php
├── routes/web.php
├── .env
└── composer.json
```

## Prerequisites

- **PHP 8.1+** with `mongodb` extension enabled
- **Composer**
- **Node.js 18+** (for TailwindCSS build)

### Enable MongoDB Extension

```bash
# Find PHP extension directory
php -i | findstr extension_dir

# Download php_mongodb.dll from https://pecl.php.net/package/mongodb
# Copy to extension directory, then add to php.ini:
extension=mongodb

# Verify
php -m | findstr mongodb
```

## Setup

```bash
cd C:\Users\LENOVO\learning\phplast

# Install PHP dependencies
composer install

# Generate app key (if prompted)
php artisan key:generate

# Install & build frontend
npm install
npm run build
```

### Configure .env

Ensure `.env` has these values:

```env
DB_CONNECTION=mongodb
MONGODB_DSN=mongodb+srv://<user>:<password>@<cluster>.mongodb.net/appointment-system
DB_DATABASE=appointment-system
SESSION_DRIVER=file

ADMIN_EMAIL=admin@healthcare.com
ADMIN_PASSWORD=admin123
```

### Start the App

```bash
cd C:\Users\LENOVO\learning\phplast
php -S 127.0.0.1:9090 -t public server.php
```

Visit **http://127.0.0.1:9090**.

> `php artisan serve` may not work on Scoop PHP installs — use `php -S` instead.

## Pages

| Route | Page | Description |
|-------|------|-------------|
| `/` | Home | Landing page |
| `/appointment` | Book Appointment | Form to book a doctor appointment |
| `/admin/login` | Admin Login | Authenticate to access admin panel |
| `/admin` | Admin Panel | Manage doctors & appointments |

## Features

### Patient
- Book appointment by doctor, date, and time
- Duplicate slot detection (same doctor + same date + same time)
- Form validation with error messages

### Admin
- Login with credentials from `.env` (`ADMIN_EMAIL` / `ADMIN_PASSWORD`)
- Add / Edit / Delete doctors
- View and delete appointments

## Troubleshooting

**MongoDB connection refused:** Verify `MONGODB_DSN` in `.env` is correct and your IP is whitelisted in Atlas network access.

**composer install fails:** Enable `mongodb` extension in `php.ini` and restart terminal.

**Blank page or routing errors:** Run `php artisan key:generate` then `php artisan optimize:clear`.
