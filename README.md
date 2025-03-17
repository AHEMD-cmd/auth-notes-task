# Laravel User Authentication & CRUD Notes API

## Project Overview
This is a Laravel-based authentication system with a CRUD note application, accessible via a web interface and APIs.

## Features
- User Registration & Login (with hashed passwords)
- Profile Management (update name, email, password)
- CRUD for Notes (Create, Read, Update, Delete)
- Authentication via API using Laravel Sanctum
- CSRF Protection and Validation
- Optional: Email Verification & Password Reset

## Installation Guide

### Prerequisites
Ensure you have the following installed:
- PHP 8.1
- Composer
- MySQL or SQLite
- Laravel 10.10
- Node.js & npm (for frontend assets)

### Setup Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/AHEMD-cmd/auth-notes-task.git
   cd auth-notes-task

2. Install dependencies:

   ```bash
   composer install
   npm install && npm run dev
   ```
3. Copy the environment file and update the database details:

   ```bash
    cp .env.example .env
   ```
4. Generate application key:

   ```bash
    php artisan key:generate
   ```
5. Run migrations:

   ```bash
    php artisan migrate
   ```
6. Start the development server:

   ```bash
    php artisan serve
   ```
7. Start queue worker:

   ```bash
    php artisan queue:work
   ```

### Api documentation: https://documenter.getpostman.com/view/17398432/2sAYkDMLVu