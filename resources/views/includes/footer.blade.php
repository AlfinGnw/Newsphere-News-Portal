<!-- Footer -->
<footer class="bg-black text-white mt-20 shadow-2xl relative z-10" style="min-height: 300px;">
  <div class="px-4 lg:px-14 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <!-- Logo dan Deskripsi -->
      <div class="lg:col-span-2">
        <div class="flex items-center gap-2 mb-4">
          <img src="{{ asset('assets/img/logo2.jpg') }}" alt="Logo" class="w-8 lg:w-10">
          <p class="text-lg lg:text-xl font-bold">Newsphere</p>
        </div>
        <p class="text-gray-300 text-sm leading-relaxed mb-4">
          Portal berita terpercaya yang menyajikan informasi terkini dan akurat 
          untuk memenuhi kebutuhan informasi masyarakat Indonesia.
        </p>
        <div class="flex gap-4">
          <a href="#" class="text-gray-400 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.357-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12.007 0C5.373 0 .007 5.373.007 12s5.366 12 11.999 12S24.007 18.627 24.007 12 18.641 0 12.007 0zM8.5 18.5c-1.5 0-2.5-1-2.5-2.5s1-2.5 2.5-2.5 2.5 1 2.5 2.5-1 2.5-2.5 2.5zm7.5 0c-1.5 0-2.5-1-2.5-2.5s1-2.5 2.5-2.5 2.5 1 2.5 2.5-1 2.5-2.5 2.5z"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- Kategori -->
      <div>
        <h3 class="font-semibold text-lg mb-4">Kategori</h3>
        <ul class="space-y-2">
          @foreach(\App\Models\NewsCategory::all() as $category)
            <li>
              <a href="{{ route('news.category', $category->slug) }}" 
                 class="text-gray-300 hover:text-white transition-colors text-sm">
                {{ $category->title }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <!-- Kontak -->
      <div>
        <h3 class="font-semibold text-lg mb-4">Kontak</h3>
        <ul class="space-y-2 text-sm text-gray-300">
          <li class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
            </svg>
            info@newsphere.com
          </li>
          <li class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
            </svg>
            +62 812 3456 7890
          </li>
          <li class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
            Jakarta, Indonesia
          </li>
        </ul>
      </div>
    </div>

    <!-- Bottom Footer -->
    <div class="border-t border-gray-700 mt-8 pt-8">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-400 text-sm">
          © {{ date('Y') }} Newsphere. All rights reserved.
        </p>
        <div class="flex gap-6 mt-4 md:mt-0">
          <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Privacy Policy</a>
          <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Terms of Service</a>
          <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">About Us</a>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- End Footer -->
