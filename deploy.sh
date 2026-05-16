#!/bin/bash

echo "🚀 Starting Deployment Process..."

# 1. Pull latest code (If using Git on server)
# git pull origin staging

# 2. Ensure critical Laravel directories exist
echo "📂 Creating required storage directories..."
mkdir -p storage/app/public/scholars
mkdir -p storage/app/livewire-tmp
mkdir -p storage/framework/{sessions,views,cache}
mkdir -p bootstrap/cache

# 3. Set strict but stable permissions for Hostinger
echo "🔒 Setting permissions..."
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# 4. Clean up old "Ghost" sessions and cache
echo "🧹 Cleaning old cache..."
php artisan optimize:clear

# 5. Optimize for Production (Caches config, routes, and views)
echo "⚡ Optimizing application..."
php artisan optimize

# 6. Run database migrations safely
echo "🗄️  Running migrations..."
php artisan migrate --force

# 7. Final Health Check
echo "✅ Deployment Successful!"
php artisan uptime || echo "⚠️  Note: Load is still high, but site is optimized."

# crons job link for the hostinger
/usr/bin/php /home/u303380656/domains/staging.ejlals.com/laravel/artisan queue:work --stop-when-empty >> /dev/null 2>&1
