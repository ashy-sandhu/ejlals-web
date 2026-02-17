# Ejlals Academy Website

Ejlals Academy is a production-ready online Islamic Academy platform built with Laravel, FilamentPHP, and Tailwind CSS.

## Features

- **Dynamic Homepage**: Featured courses, books, and the latest articles.
- **Admin Panel**: Full-featured content management system for courses, books, blog posts, and enrollments.
- **Brand Design**: Custom design system based on academy brand colors (Teal & Gold).
- **Responsive Layout**: Sticky navigation and mobile-friendly design.

## Tech Stack

- **Backend**: Laravel 12.x
- **Admin Panel**: FilamentPHP 3.x
- **Frontend**: Blade + Alpine.js
- **Styling**: Tailwind CSS 4.x
- **Database**: MySQL

## Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & NPM (for asset compilation)
- MySQL/MariaDB

## Installation & Setup

Follow these steps to set up the project on another machine:

1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   cd Ejlals
   ```

2. **Install dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**:
   Copy the example environment file and configure your database settings:
   ```bash
   cp .env.example .env
   # Update DB_* variables in .env
   ```

4. **Generate App Key**:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**:
   ```bash
   php artisan migrate --seed
   ```

6. **Create Admin User**:
   ```bash
   php artisan make:filament-user
   ```

7. **Compile Assets**:
   ```bash
   npm run build
   ```

8. **Serve the application**:
   ```bash
   php artisan serve
   ```

## Contribution & Development

- Assets are managed via Vite. Run `npm run dev` for local development with Hot Module Replacement.
- Admin resources are located in `app/Filament/Resources`.
- Custom styles are in `resources/css/app.css`.

## License

This project is for Ejlals Learning Horizon. All rights reserved.
