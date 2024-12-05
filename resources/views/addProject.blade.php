<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Halaman Home</title>
</head>
<body class="h-full">
<div class="min-h-full">
  <nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="size-8" src="img/logo_unspoken.png" alt="logo">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="/" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Home</a>
              <a href="/about" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
              <a href="/blog" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Blog</a>
              <a href="/contact" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
              <a href="/project" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Project</a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
              </svg>
            </button>

            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img class="size-8 rounded-full" src="https://i.pinimg.com/736x/17/21/23/1721232a3b836c3ce4002724b24fdbe1.jpg" alt="">
                </button>
              </div>


              <div  x-show="isOpen"
                x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg :class="{'hidden': isOpen, 'block': !isOpen }"
            class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg  :class="{'block': isOpen, 'hidden': !isOpen }"
             class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="/home" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
        <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
        <a href="/blog" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Blog</a>
        <a href="/contact" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
        <a href="/project" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Project</a>
      </div>
      <div class="border-t border-gray-700 pb-3 pt-4">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            <img class="size-10 rounded-full" src="https://i.pinimg.com/736x/17/21/23/1721232a3b836c3ce4002724b24fdbe1.jpg" alt="">
          </div>
          <div class="ml-3">
            <div class="text-base/5 font-medium text-white">Azizah Istiqomah</div>
            <div class="text-sm font-medium text-gray-400">zizaistiqomah@gmail.com</div>
          </div>
          <button type="button" class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
          </button>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
        </div>
      </div>
    </div>
  </nav>

  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Welcome to UnSpoken</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
       <div class="min-h-screen bg-gray-50 text-gray-800">



  <!-- rekomendasi -->
  <section class="py-16 px-8">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-3xl font-bold mb-6 text-center">Form Artikel</h2>
      <p class="text-gray-600 text-center mb-12">Silakan isi form untuk membuat artikel Anda</p>

      <!-- Form -->
      <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Grid layout 2-2-1 -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
          <!-- Input Group for Judul -->
          <div class="mb-6 col-span-1">
            <label for="judul" class="block text-gray-700 font-semibold mb-2">Judul</label>
            <input type="text" name="judul" id="judul" class="w-full p-3 bg-gray-100 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500" required value="{{ old('judul') }}" />
          </div>

          <!-- Input Group for Sub Judul -->
          <div class="mb-6 col-span-1">
            <label for="sub_judul" class="block text-gray-700 font-semibold mb-2">Sub Judul</label>
            <input type="text" name="sub_judul" id="sub_judul" class="w-full p-3 bg-gray-100 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500" required value="{{ old('sub_judul') }}" />
          </div>

          <!-- Input Group for Penulis -->
          <div class="mb-6 col-span-1">
            <label for="penulis" class="block text-gray-700 font-semibold mb-2">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="w-full p-3 bg-gray-100 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500" required value="{{ old('penulis') }}" />
          </div>

          <!-- Input Group for Gambar -->
          <div class="mb-6 col-span-1">
            <label for="images" class="block text-gray-700 font-semibold mb-2">Gambar</label>
            <input type="file" name="images" id="images" class="w-full p-3 bg-gray-100 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
          </div>
        </div>
        <div class="mb-6 col-span-2">
            <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
            <select name="status" id="status" class="w-full p-3 bg-gray-100 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                <option value="private" disabled selected>Pilih Status</option>
                <option value="private" {{ old('status') == 'private' ? : '' }}>Private</option>
                <option value="publish" {{ old('status') == 'publish' ? : '' }}>Publish</option>
            </select>
        </div>

        <!-- Isi Artikel -->
        <div class="mb-6 col-span-2">
          <label for="isi_artikel" class="block text-gray-700 font-semibold mb-2">Isi Artikel</label>
          <textarea name="isi_artikel" id="isi_artikel" rows="6" class="w-full p-3 bg-gray-100 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>{{ old('isi_artikel') }}</textarea>
        </div>

        <div class="space-x-4">
          <button type="reset" class="px-6 py-2 bg-red-600 text-white rounded-md shadow hover:bg-red-700 transition focus:outline-none">Batal</button>
          <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none">Simpan</button>
        </div>
      </form>
    </div>
</section>




</div>


</body>
</html>
