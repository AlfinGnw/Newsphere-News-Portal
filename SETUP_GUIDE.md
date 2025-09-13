# Setup Guide - Newsphere Portal

## 🚀 Quick Start

### Prerequisites
- PHP 8.1+
- Composer
- Node.js 16+
- MySQL 8.0+ atau SQLite
- Web Server (Apache/Nginx)

### 1. Environment Setup

#### Clone Repository
```bash
git clone <repository-url>
cd portal-berita
```

#### Install Dependencies
```bash
# PHP dependencies
composer install

# Node.js dependencies
npm install
```

#### Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

#### Database Setup
```bash
# Create database (MySQL)
mysql -u root -p
CREATE DATABASE portal_berita;

# Or use SQLite (default)
touch database/database.sqlite
```

#### Environment Variables (.env)
```env
APP_NAME="Newsphere"
APP_ENV=local
APP_KEY=base64:your-generated-key
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portal_berita
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DISK=public
```

### 2. Database Migration

```bash
# Run migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed

# Create storage link
php artisan storage:link
```

### 3. Asset Compilation

```bash
# Development
npm run dev

# Production
npm run build
```

### 4. Start Development Server

```bash
php artisan serve
```

Visit: `http://localhost:8000`

## 🔧 Configuration

### Admin Panel Setup

1. **Access Admin Panel**
   - URL: `http://localhost:8000/admin`
   - Default credentials (if seeded):
     - Email: admin@newsphere.com
     - Password: password

2. **Create Admin User** (if not seeded)
   ```bash
   php artisan make:filament-user
   ```

### File Storage Configuration

1. **Storage Link**
   ```bash
   php artisan storage:link
   ```

2. **Permissions** (Linux/Mac)
   ```bash
   chmod -R 755 storage/
   chmod -R 755 bootstrap/cache/
   ```

3. **Upload Directory**
   - Path: `storage/app/public/`
   - Public URL: `storage/`

### Email Configuration (Optional)

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

## 🎨 Customization

### Branding

1. **Logo**
   - Replace: `public/assets/img/logo2.jpg`
   - Update favicon: `public/favicon.ico`

2. **Colors**
   - Edit: `tailwind.config.js`
   - Primary color: `#f97316` (orange)

3. **Site Name**
   - Update: `resources/views/includes/navbar.blade.php`
   - Change "Newsphere" to your brand name

### Content Management

1. **Categories**
   - Admin Panel → Categories
   - Add/edit news categories

2. **Authors**
   - Admin Panel → Authors
   - Manage author profiles

3. **News**
   - Admin Panel → News
   - Create/edit news articles

### Layout Customization

1. **Header/Navbar**
   - File: `resources/views/includes/navbar.blade.php`
   - Modify navigation items, logo, search

2. **Footer**
   - File: `resources/views/includes/footer.blade.php`
   - Update company info, links

3. **Homepage**
   - File: `resources/views/pages/landing.blade.php`
   - Customize hero section, featured content

## 🚀 Production Deployment

### Server Requirements
- PHP 8.1+
- MySQL 8.0+
- Nginx/Apache
- SSL Certificate
- Domain name

### Deployment Steps

1. **Server Setup**
   ```bash
   # Update system
   sudo apt update && sudo apt upgrade -y
   
   # Install PHP and extensions
   sudo apt install php8.1-fpm php8.1-mysql php8.1-xml php8.1-mbstring php8.1-curl
   
   # Install Composer
   curl -sS https://getcomposer.org/installer | php
   sudo mv composer.phar /usr/local/bin/composer
   
   # Install Node.js
   curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
   sudo apt-get install -y nodejs
   ```

2. **Application Deployment**
   ```bash
   # Clone repository
   git clone <repository-url> /var/www/portal-berita
   cd /var/www/portal-berita
   
   # Install dependencies
   composer install --optimize-autoloader --no-dev
   npm install && npm run build
   
   # Set permissions
   sudo chown -R www-data:www-data /var/www/portal-berita
   sudo chmod -R 755 /var/www/portal-berita
   ```

3. **Environment Configuration**
   ```bash
   # Copy and edit environment
   cp .env.example .env
   nano .env
   
   # Update for production
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://yourdomain.com
   
   # Database configuration
   DB_CONNECTION=mysql
   DB_HOST=localhost
   DB_DATABASE=portal_berita
   DB_USERNAME=your_db_user
   DB_PASSWORD=your_db_password
   ```

4. **Database Setup**
   ```bash
   # Run migrations
   php artisan migrate --force
   
   # Create storage link
   php artisan storage:link
   
   # Cache configuration
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

5. **Web Server Configuration**

   **Nginx Configuration** (`/etc/nginx/sites-available/portal-berita`)
   ```nginx
   server {
       listen 80;
       server_name yourdomain.com;
       root /var/www/portal-berita/public;
       
       index index.php;
       
       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }
       
       location ~ \.php$ {
           fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
           fastcgi_index index.php;
           fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
           include fastcgi_params;
       }
       
       location ~ /\.ht {
           deny all;
       }
   }
   ```

6. **SSL Certificate**
   ```bash
   # Install Certbot
   sudo apt install certbot python3-certbot-nginx
   
   # Get SSL certificate
   sudo certbot --nginx -d yourdomain.com
   ```

### Performance Optimization

1. **PHP-FPM Optimization**
   ```ini
   ; /etc/php/8.1/fpm/pool.d/www.conf
   pm.max_children = 50
   pm.start_servers = 5
   pm.min_spare_servers = 5
   pm.max_spare_servers = 35
   ```

2. **Nginx Optimization**
   ```nginx
   # Enable gzip compression
   gzip on;
   gzip_types text/plain text/css application/json application/javascript text/xml application/xml;
   
   # Browser caching
   location ~* \.(jpg|jpeg|png|gif|ico|css|js)$ {
       expires 1y;
       add_header Cache-Control "public, immutable";
   }
   ```

3. **Laravel Optimization**
   ```bash
   # Cache everything
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   
   # Optimize autoloader
   composer install --optimize-autoloader --no-dev
   ```

## 🔍 Troubleshooting

### Common Issues

1. **Storage Link Error**
   ```bash
   php artisan storage:link
   sudo chown -R www-data:www-data storage/
   ```

2. **Permission Errors**
   ```bash
   sudo chown -R www-data:www-data .
   sudo chmod -R 755 storage/ bootstrap/cache/
   ```

3. **Database Connection Error**
   - Check database credentials in `.env`
   - Ensure database service is running
   - Verify database exists

4. **Asset Loading Issues**
   ```bash
   npm run build
   php artisan storage:link
   ```

5. **Cache Issues**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan view:clear
   ```

### Debug Mode

**Development** (`.env`)
```env
APP_DEBUG=true
LOG_LEVEL=debug
```

**Production** (`.env`)
```env
APP_DEBUG=false
LOG_LEVEL=error
```

### Log Files
- Application logs: `storage/logs/laravel.log`
- Nginx logs: `/var/log/nginx/error.log`
- PHP-FPM logs: `/var/log/php8.1-fpm.log`

## 📞 Support

- **Documentation**: Check this guide and technical docs
- **Issues**: GitHub Issues page
- **Email**: support@newsphere.com

---

**Setup Guide** - Newsphere Portal v1.0.0
