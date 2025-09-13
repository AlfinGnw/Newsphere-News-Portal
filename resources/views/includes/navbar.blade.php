    <!-- Nav -->
    <nav class="sticky top-0 z-50 bg-white shadow-sm">
      <div class="px-4 lg:px-14">
        <div class="flex justify-between items-center py-5">
          <!-- Logo -->
          <a href="{{ route('landing') }}" class="flex items-center gap-2 flex-shrink-0">
            <img src="{{ asset('assets/img/logo2.jpg') }}" alt="Logo" class="w-8 lg:w-10">
            <p class="text-lg lg:text-xl font-bold">Newsphere</p>
          </a>

          <!-- Desktop Menu -->
          <div class="hidden lg:flex items-center gap-10 flex-1 justify-center">
            <ul class="flex items-center gap-6 font-medium text-base">
              <li><a href="{{ route('landing') }}" class="{{ request()->is('/') ? 'text-primary' : '' }} hover:text-primary transition">Beranda</a></li>
              @foreach(\App\Models\NewsCategory::all() as $category)
                  <li><a href="{{ route('news.category', $category->slug) }}" class="hover:text-primary transition">{{ $category->title }}</a></li>
              @endforeach
            </ul>
          </div>

          <!-- Desktop Search dan Login -->
          <div class="hidden lg:flex items-center gap-4 flex-shrink-0">
            <form action="{{ route('news.search') }}" method="GET" class="relative">
              <input type="text" name="q" placeholder="Cari berita..."
                class="border border-slate-300 rounded-full px-4 py-2 pl-8 w-64 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                id="searchInput" />
              <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                <img src="{{ asset('assets/img/search.png') }}" alt="search" class="w-4">
              </span>
            </form>
            <a href="/admin" class="bg-primary px-6 py-2 rounded-full text-white font-semibold text-sm hover:bg-primary/90 transition">
              Masuk
            </a>
          </div>

          <!-- Mobile Menu Button -->
          <button class="lg:hidden text-primary focus:outline-none p-2 hover:bg-gray-100 rounded-md transition flex-shrink-0" id="menu-toggle" type="button">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden pb-4">
          <div class="flex flex-col space-y-4">
            <!-- Mobile Navigation -->
            <ul class="flex flex-col space-y-3">
              <li><a href="{{ route('landing') }}" class="block py-2 text-base font-medium {{ request()->is('/') ? 'text-primary' : '' }} hover:text-primary transition">Beranda</a></li>
              @foreach(\App\Models\NewsCategory::all() as $category)
                  <li><a href="{{ route('news.category', $category->slug) }}" class="block py-2 text-base font-medium hover:text-primary transition">{{ $category->title }}</a></li>
              @endforeach
            </ul>

            <!-- Mobile Search -->
            <div class="pt-4 border-t border-gray-200">
              <form action="{{ route('news.search') }}" method="GET" class="relative">
                <input type="text" name="q" placeholder="Cari berita..."
                  class="w-full border border-slate-300 rounded-full px-4 py-3 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                  id="mobile-search" />
                <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                  <img src="{{ asset('assets/img/search.png') }}" alt="search" class="w-4">
                </span>
              </form>
            </div>

            <!-- Mobile Login -->
            <div class="pt-4">
              <a href="/admin" class="block w-full bg-primary text-center py-3 rounded-full text-white font-semibold hover:bg-primary/90 transition">
                Masuk
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- End Nav -->

    <!-- JavaScript untuk Mobile Menu -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        
        menuToggle.addEventListener('click', function() {
          mobileMenu.classList.toggle('hidden');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
          if (!menuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
            mobileMenu.classList.add('hidden');
          }
        });
      });
    </script>