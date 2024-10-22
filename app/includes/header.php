<header>
  <nav class="flex justify-between items-center p-5 px-12 bg-gray-800 text-white">
    <div class="flex items-center gap-2 text-lg font-bold">
      <img class="roll-image w-12" src="/IAS_Activity/public/images/web-logo.png" alt="">
      <a href="http://localhost/IAS_Activity/index.php">Pokekemon</a>
    </div>
    
    <div class="hidden sm:flex">
      <?php if(!isset($_SESSION['user'])):?>
        <a href="http://localhost/IAS_Activity/app/views/login.php" class="px-6 py-2 bg-red-800 text-white font-bold hover:bg-red-900 rounded-md mr-2">Login</a>
        <a href="http://localhost/IAS_Activity/app/views/register.php" class="px-6 py-2 bg-white text-black font-bold hover:bg-gray-400 rounded-md">Register</a>
       <?php else: ?>
        <a href="http://localhost/IAS_Activity/app/actions/logout.process.php" class="flex px-6 py-2 bg-slate-700 text-red-400 font-bold duration-300 hover:bg-slate-900 hover:shadow-lg rounded-md">
          <svg class="w-6 h-6 text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
          </svg>
          Logout
        </a>
      <?php endif; ?>
      </div>

    <div class="sm:hidden">
      <button id="burger-menu" class="focus:outline-none">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
    </div>

    <div id="dropdown-menu" class="hidden sm:hidden absolute right-4 z-50 top-16 bg-gray-700 rounded-lg shadow-lg w-40 overflow-hidden">
      <?php if(!isset($_SESSION['user'])):?>
        <a href="http://localhost/IAS_Activity/app/views/login.php" class="block px-4 py-2 text-white hover:bg-gray-600">Login</a>
        <a href="http://localhost/IAS_Activity/app/views/register.php" class="block px-4 py-2 text-white hover:bg-gray-600">Register</a>
      <?php else: ?>
        <a href="http://localhost/IAS_Activity/app/actions/logout.process.php" class="block px-4 py-2 text-white hover:bg-gray-600">Logout</a>
      <?php endif; ?>
    </div>
  </nav>

  <!-- para inner header -->
  <?php if(isset($_SESSION['user'])):?>
    <div class="flex justify-center bg-slate-700 rounded-bl-3xl rounded-br-3xl">
      <a href="http://localhost/IAS_Activity/app/views/dashboard.php">
        <button id="home" data-tg-tour="This is the Home page" class="p-3 text-red-500 duration-100 font-semibold hover:text-white hover:scale-110 border-b-0">Home</button>
      </a>
      <a href="http://localhost/IAS_Activity/app/views/dashboard.php">
        <button id="pokemon" data-tg-tour="Pokemon list" class="p-3 text-red-500 duration-100 font-semibold hover:text-white hover:scale-110">Pokemons</button>
      </a>
      <a href="http://localhost/IAS_Activity/app/views/dashboard.php">
        <button id="regions" data-tg-tour="Pokemon world Regions and Maps" class="p-3 text-red-500 duration-100 font-semibold hover:text-white hover:scale-110">Regions</button>
      </a>
      <a href="http://localhost/IAS_Activity/app/views/dashboard.php">
        <button id="history" data-tg-tour="Story of the Pokemon" class="p-3 text-red-500 duration-100 font-semibold hover:text-white hover:scale-110">History</button>
      </a>
    </div>
  <?php endif;?>

  <script>
    // Toggle the dropdown menu on burger icon click
    document.getElementById('burger-menu').addEventListener('click', function() {
      const dropdown = document.getElementById('dropdown-menu');
      dropdown.classList.toggle('hidden');
    });
  </script>
</header>
