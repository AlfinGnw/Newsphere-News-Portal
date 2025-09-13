# Newsphere - Portal Berita Terpercaya

Portal berita modern yang dibangun dengan Laravel dan Filament Admin Panel.

## 🚀 Fitur Utama

### Frontend
- Landing page responsif dengan hero section
- Sistem pencarian berita
- Kategori berita (Kesehatan, Gaya Hidup, Politik, Wisata)
- Detail berita dengan layout rapi
- Profil author
- Design responsive untuk semua device

### Backend (Admin Panel)
- Filament Admin Panel
- Manajemen berita (CRUD)
- Manajemen kategori
- Manajemen author
- Manajemen banner
- Media management

## 🛠 Teknologi

- **Backend**: Laravel 12, Filament 4, MySQL/SQLite
- **Frontend**: Blade, Tailwind CSS, Swiper.js
- **Tools**: Vite, Carbon, Laravel Storage

## ⚙️ Instalasi

1. **Clone & Install**
   ```bash
   git clone <repo>
   cd portal-berita
   composer install
   npm install
   ```

2. **Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database**
   ```bash
   php artisan migrate
   php artisan db:seed
   php artisan storage:link
   ```

4. **Assets**
   ```bash
   npm run build
   php artisan serve
   ```

## 📁 Struktur Proyek

```
portal-berita/
├── app/
│   ├── Filament/Resources/     # Admin resources
│   ├── Http/Controllers/       # Controllers
│   └── Models/                 # Eloquent models
├── database/migrations/        # Database schema
├── resources/views/            # Blade templates
│   ├── includes/              # Components
│   ├── layouts/               # Layouts
│   └── pages/                 # Pages
└── public/assets/             # Static files
```

## 🌐 Routes

- `GET /` - Landing page
- `GET /search` - Search berita
- `GET /{slug}` - Kategori berita
- `GET /news/{slug}` - Detail berita
- `GET /author/{username}` - Profil author
- `GET /admin` - Admin panel

## 🗄 Database Schema

### Tables
- `news` - Artikel berita
- `news_categories` - Kategori berita
- `authors` - Penulis
- `banners` - Banner/slider

### Relationships
```php
News belongsTo Author
News belongsTo NewsCategory
NewsCategory hasMany News
Author hasMany News
```

## 🎨 Customization

### Styling
- Edit `resources/css/app.css`
- Gunakan Tailwind classes
- Custom colors di `tailwind.config.js`

### Layout
- `layouts/app.blade.php` - Main layout
- `includes/navbar.blade.php` - Navigation
- `includes/footer.blade.php` - Footer

## 🔍 Troubleshooting

1. **Storage Link**: `php artisan storage:link`
2. **Permissions**: `chmod -R 755 storage/`
3. **Cache**: `php artisan config:clear`
4. **Assets**: `npm run build`

## 📞 Support

- Email: support@newsphere.com
- Issues: GitHub Issues

---

**Newsphere** - Built with Laravel & Filament ❤️
