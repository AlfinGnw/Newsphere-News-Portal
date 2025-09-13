<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.ico') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.ico') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
  <meta name="msapplication-TileColor" content="#f97316">
  <meta name="theme-color" content="#f97316">
  
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <style>
    .line-clamp-2 {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }
    
    /* Ensure footer is visible */
    footer {
      position: relative;
      z-index: 10;
      background-color: #000000 !important;
    }
    
    /* Mobile menu animation */
    #mobile-menu {
      transition: all 0.3s ease-in-out;
    }
    
    #mobile-menu.hidden {
      display: none !important;
    }
    
    /* Mobile menu button styling */
    #menu-toggle {
      display: block !important;
      background-color: #f3f4f6;
      border: 1px solid #e5e7eb;
      min-width: 44px;
      min-height: 44px;
    }
    
    @media (min-width: 1024px) {
      #menu-toggle {
        display: none !important;
      }
    }
    
    /* Ensure mobile menu is visible on small screens */
    @media (max-width: 1023px) {
      #menu-toggle {
        display: flex !important;
        align-items: center;
        justify-content: center;
        background-color: #f3f4f6;
        border: 1px solid #e5e7eb;
        min-width: 44px;
        min-height: 44px;
      }
    }
  </style>
</head>

<body class="min-h-screen flex flex-col bg-white">
  <div class="flex-1">
    @include('includes.navbar')

    <main>
      @yield('content')
    </main>
  </div>

  @include('includes.footer')


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
</body>

</html>