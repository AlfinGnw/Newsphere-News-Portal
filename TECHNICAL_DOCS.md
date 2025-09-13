# Technical Documentation - Newsphere Portal

## 📋 Table of Contents

1. [System Architecture](#system-architecture)
2. [Database Design](#database-design)
3. [API Documentation](#api-documentation)
4. [Frontend Components](#frontend-components)
5. [Admin Panel Configuration](#admin-panel-configuration)
6. [Security Implementation](#security-implementation)
7. [Performance Optimization](#performance-optimization)

## 🏗 System Architecture

### MVC Pattern
```
Controller (Logic) → Model (Data) → View (Presentation)
```

### File Structure
```
app/
├── Http/Controllers/
│   ├── LandingController.php    # Homepage logic
│   ├── NewsController.php       # News CRUD & display
│   └── AuthorController.php     # Author profiles
├── Models/
│   ├── News.php                 # News model
│   ├── NewsCategory.php         # Category model
│   ├── Author.php               # Author model
│   └── Banner.php               # Banner model
└── Filament/Resources/          # Admin panel resources
```

## 🗄 Database Design

### Entity Relationship Diagram

```
Authors (1) ──── (N) News (N) ──── (1) NewsCategories
    │                                    │
    │                                    │
    └─── username, name, email            └─── title, slug
         avatar, bio
```

### Migration Files
- `create_authors_table.php`
- `create_news_categories_table.php`
- `create_news_table.php`
- `create_banners_table.php`
- `add_is_featured_column_to_news_table.php`

### Key Relationships
```php
// News Model
public function author()
{
    return $this->belongsTo(Author::class);
}

public function newsCategory()
{
    return $this->belongsTo(NewsCategory::class, 'category_id');
}

// NewsCategory Model
public function news()
{
    return $this->hasMany(News::class, 'category_id');
}
```

## 🌐 API Documentation

### Public Endpoints

#### GET /
**Description**: Landing page with featured news
**Response**: HTML view with news data

#### GET /search
**Description**: Search news by title and content
**Parameters**:
- `q` (string): Search query
**Response**: HTML view with search results

#### GET /{slug}
**Description**: Get news by category
**Parameters**:
- `slug` (string): Category slug
**Response**: HTML view with category news

#### GET /news/{slug}
**Description**: Get single news article
**Parameters**:
- `slug` (string): News slug
**Response**: HTML view with news detail

#### GET /author/{username}
**Description**: Get author profile
**Parameters**:
- `username` (string): Author username
**Response**: HTML view with author info

### Admin Endpoints

#### GET /admin
**Description**: Admin login page
**Response**: HTML login form

#### POST /admin
**Description**: Admin authentication
**Parameters**:
- `email` (string): Admin email
- `password` (string): Admin password
**Response**: Redirect to admin dashboard

## 🎨 Frontend Components

### Layout Structure
```html
<!DOCTYPE html>
<html>
<head>
    <!-- Meta tags, favicon, CSS -->
</head>
<body>
    @include('includes.navbar')
    <main>
        @yield('content')
    </main>
    @include('includes.footer')
</body>
</html>
```

### Key Components

#### Navbar (`includes/navbar.blade.php`)
- Logo and brand name
- Navigation menu
- Search functionality
- Mobile responsive burger menu
- Login button

#### Footer (`includes/footer.blade.php`)
- Company information
- Social media links
- Copyright notice

#### News Cards
- Thumbnail image
- Title with line-clamp
- Category badge
- Author and date
- Hover effects

### Responsive Design
- **Mobile First**: Base styles for mobile
- **Breakpoints**: 
  - `sm`: 640px
  - `md`: 768px
  - `lg`: 1024px
  - `xl`: 1280px

### CSS Classes Used
```css
/* Layout */
.flex, .grid, .container
.min-h-screen, .h-full, .w-full

/* Spacing */
.p-4, .px-6, .py-8, .mb-4, .mt-8

/* Colors */
.bg-primary, .text-primary, .border-slate-300

/* Typography */
.text-lg, .font-bold, .line-clamp-2

/* Effects */
.hover:shadow-md, .transition, .rounded-lg
```

## ⚙️ Admin Panel Configuration

### Filament Resources

#### NewsResource
```php
public static function form(Form $form): Form
{
    return $form->schema([
        TextInput::make('title')->required(),
        TextInput::make('slug')->required(),
        Select::make('category_id')->relationship('newsCategory', 'title'),
        Select::make('author_id')->relationship('author', 'name'),
        FileUpload::make('thumbnail')->image(),
        RichEditor::make('content')->required(),
        Toggle::make('is_featured'),
    ]);
}
```

#### NewsCategoryResource
```php
public static function form(Form $form): Form
{
    return $form->schema([
        TextInput::make('title')->required(),
        TextInput::make('slug')->required(),
    ]);
}
```

### Admin Panel Features
- **Dashboard**: Statistics and overview
- **News Management**: Full CRUD operations
- **Category Management**: Create/edit categories
- **Author Management**: Manage authors
- **Media Library**: File upload and management
- **User Management**: Admin user accounts

## 🔒 Security Implementation

### Authentication
- Filament built-in authentication
- Password hashing with bcrypt
- Session management

### Authorization
- Role-based access control
- Admin-only access to management features
- CSRF protection on forms

### Data Validation
```php
// Controller validation
$request->validate([
    'title' => 'required|string|max:255',
    'content' => 'required|string',
    'category_id' => 'required|exists:news_categories,id',
    'author_id' => 'required|exists:authors,id',
]);
```

### File Upload Security
- Image type validation
- File size limits
- Secure file storage

## ⚡ Performance Optimization

### Database Optimization
- Eager loading to prevent N+1 queries
```php
$news = News::with(['author', 'newsCategory'])->get();
```

- Database indexing on frequently queried columns
- Pagination for large datasets

### Caching Strategy
- View caching for static content
- Query result caching
- Asset caching with Vite

### Image Optimization
- Responsive images
- Lazy loading
- WebP format support

### Frontend Optimization
- Minified CSS and JS
- CDN for external libraries
- Optimized asset loading

## 🐛 Error Handling

### Custom Error Pages
- 404 Not Found
- 500 Server Error
- Custom error messages

### Logging
- Laravel built-in logging
- Error tracking and monitoring
- Debug mode configuration

### Validation Errors
- Form validation with error messages
- User-friendly error display
- Client-side validation

## 📊 Monitoring & Analytics

### Performance Metrics
- Page load times
- Database query performance
- Memory usage monitoring

### User Analytics
- Page views tracking
- Search query analytics
- Popular content tracking

## 🔧 Development Tools

### Code Quality
- PHP CS Fixer for code formatting
- Laravel Pint for code style
- ESLint for JavaScript

### Testing
- PHPUnit for backend testing
- Feature tests for API endpoints
- Browser tests for frontend

### Debugging
- Laravel Debugbar
- Query logging
- Error reporting

---

**Technical Documentation** - Newsphere Portal v1.0.0
