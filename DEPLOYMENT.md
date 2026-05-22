# Deployment Guide for Forahia Solutions

## Step 1: Build Assets
In your local environment, run:
```
npm run build
```

## Step 2: Upload Files
Upload the following directories and files to your production server:
- The entire `app` directory
- The entire `bootstrap` directory
- The entire `config` directory
- The entire `database` directory
- The entire `public` directory
- The entire `resources` directory
- The entire `routes` directory
- The entire `storage` directory
- The entire `vendor` directory
- All root files including `.htaccess`, `artisan`, etc.

## Step 3: Configure Environment
1. Upload the `.env.production` file to your server
2. Rename it to `.env` on the server:
```
mv .env.production .env
```

## Step 4: Set Permissions
```
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 777 storage/logs
chmod -R 777 storage/framework
```

## Step 5: Clear Cache
```
php artisan optimize:clear
```

## Step 6: Verify Assets
Make sure the following files exist on your production server:
- `/public/build/assets/vendor.KOmfmGu7.css`
- `/public/build/assets/app.BADz3ByD.css`
- `/public/build/assets/app.CKdAjmU_.css`
- `/public/build/assets/chunks/vendor.CgHSczPe.js`
- `/public/build/assets/app.DQjZwgsJ.js`

## Step 7: Verify Configuration
Check that:
- `.env` file has `APP_ENV=production`
- `.env` file has `APP_DEBUG=false` (or true for troubleshooting)
- `.env` file has `VITE_ENABLE_DEV_SERVER=false`
- `.env` file has `SESSION_DRIVER=file` (not database)

## Step 8: Test Website
Visit https://forahia.com to verify everything works correctly.
