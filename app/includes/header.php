<header>
  <nav class="flex justify-between items-center p-8 px-12 bg-gray-800 text-white">
    <div class="flex items-center gap-2 text-lg font-bold">
      <img class="roll-image w-12" src="/IAS_Activity/public/images/web-logo.png" alt="">
      <a href="http://localhost/IAS_Activity/index.php">Pokekemon</a>
    </div>
    
    <div class="hidden sm:flex">
      <a href="http://localhost/IAS_Activity/app/views/login.php" class="px-6 py-2 bg-red-800 text-white font-bold hover:bg-red-900 rounded-md mr-2">Login</a>
      <a href="http://localhost/IAS_Activity/app/views/register.php" class="px-6 py-2 bg-white text-black font-bold hover:bg-gray-400 rounded-md">Register</a>
    </div>

    <div class="sm:hidden">
      <button id="burger-menu" class="focus:outline-none">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
    </div>

    <div id="dropdown-menu" class="hidden sm:hidden absolute right-4 z-50 top-16 bg-gray-700 rounded-lg shadow-lg w-40">
      <a href="http://localhost/IAS_Activity/app/views/login.php" class="block px-4 py-2 text-white hover:bg-gray-600">Login</a>
      <a href="http://localhost/IAS_Activity/app/views/register.php" class="block px-4 py-2 text-white hover:bg-gray-600">Register</a>
    </div>
  </nav>

  <script>
    // Toggle the dropdown menu on burger icon click
    document.getElementById('burger-menu').addEventListener('click', function() {
      const dropdown = document.getElementById('dropdown-menu');
      dropdown.classList.toggle('hidden');
    });
  </script>
</header>
