# Newsphere - Portal Berita Terpercaya

[![GitHub](https://img.shields.io/badge/GitHub-Newsphere--News--Portal-blue?style=flat-square&logo=github)](https://github.com/AlfinGnw/Newsphere-News-Portal)
[![Laravel](https://img.shields.io/badge/Laravel-12-red?style=flat-square&logo=laravel)](https://laravel.com)
[![Filament](https://img.shields.io/badge/Filament-4-orange?style=flat-square)](https://filamentphp.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat-square&logo=tailwind-css)](https://tailwindcss.com)

Portal berita modern yang dibangun dengan Laravel dan Filament Admin Panel untuk manajemen konten berita yang efisien.

## 📦 Repository

**GitHub**: [https://github.com/AlfinGnw/Newsphere-News-Portal](https://github.com/AlfinGnw/Newsphere-News-Portal)

## 🚀 Quick Start

### Clone Repository
```bash
git clone https://github.com/AlfinGnw/Newsphere-News-Portal.git
cd Newsphere-News-Portal
```

### Prerequisites
- PHP 8.4+
- Composer
- Node.js 16+
- MySQL 8.4+ atau SQLite

### Installation

1. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database Setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   php artisan storage:link
   ```

4. **Build Assets**
   ```bash
   npm run build
   ```

5. **Start Server**
   ```bash
   php artisan serve
   ```

Visit: `http://localhost:8000`

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

- **Backend**: Laravel 11, Filament 3, MySQL/SQLite
- **Frontend**: Blade, Tailwind CSS, Swiper.js
- **Tools**: Vite, Carbon, Laravel Storage

## 📁 Struktur Proyek

```
Newsphere-News-Portal/
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

## 📚 Documentation

- [Setup Guide](SETUP_GUIDE.md) - Panduan instalasi dan deployment
- [Technical Docs](TECHNICAL_DOCS.md) - Dokumentasi teknis lengkap
- [Documentation](DOCUMENTATION.md) - Dokumentasi umum

## 🔍 Troubleshooting

1. **Storage Link**: `php artisan storage:link`
2. **Permissions**: `chmod -R 755 storage/`
3. **Cache**: `php artisan config:clear`
4. **Assets**: `npm run build`

## 🤝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Support

- **Email**: alfingunawan003.com
- **Issues**: [GitHub Issues](https://github.com/AlfinGnw/Newsphere-News-Portal/issues)
- **Documentation**: [GitHub Wiki](https://github.com/AlfinGnw/Newsphere-News-Portal/wiki)

---

**Newsphere** - Built with Laravel & Filament ❤️

<p align="center">
  <img src="public/assets/img/logo2.jpg" alt="Newsphere Logo" width="100">
</p>
