<?php
  session_start();
  if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google reCAPTCHA script -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <!-- tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- gologloglo font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nova+Mono&family=Rubik+Mono+One&display=swap" rel="stylesheet">

  <!-- my custom css and js -->
  <link rel="stylesheet" href="/IAS_Activity/app/css/logo-swing.css">
  <link rel="stylesheet" href="/IAS_Activity/app/css/bubblemsg.css">
  <script src="../scripts/commons/toastNotification.js"></script>

  <title>Pokekemon | Login</title>
</head>
<body>

  <?php
    include '../includes/header.php';
  ?>

  <!-- just a toaster message -->
  <?php
    if (isset($_SESSION['toast'])) {
      echo "
      <script>
        toast('" . $_SESSION['toast']['title'] . "', '" . $_SESSION['toast']['message'] . "', '" . $_SESSION['toast']['type'] . "');
      </script>";
  
    }
    unset($_SESSION['toast']);
  ?>

  <div class="flex justify-center items-center bg-slate-200 w-full h-[600px] bg-cover bg-center" style="background-image: url('/IAS_Activity/public/images/landing-bg.jpg');">

    <!-- main Div -->
    <div class="flex flex-col m-2 w-[450px] md:w-[500px] h-auto bg-white shadow-lg rounded-lg overflow-hidden bg-cover bg-center" style="background-image: url('/IAS_Activity/public/images/login-bg.jpg');">
      <!-- Header ng form / title -->
      <div class="relative bg-gray-800 overflow-hidden">
        <h1 class="text-center text-white text-[1.4rem] font-bold py-6">LOGIN</h1>
        <img class="absolute -top-11 -left-8 w-[200px]" src="/IAS_Activity/public/images/pokeball.png" alt="pokeball">
      </div>
      <!-- Main body -->
      <div class="px-4 py-6">
        <!-- onsce na submitted itong path from the action ang pupuntahan -->
        <form action="../actions/login.process.php" method="POST" id="loginForm">
          <div class="flex flex-col m-2">
            <label for="email" class="text-sm font-thin text-slate-700">Enter your email</label>
            <input
              class="border border-slate-600 p-2 rounded-md"
              type="email" name="email" id="email" placeholder="Email"
              required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
              title="Please enter a valid email address"
              value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>"
            >
          </div>
          <div class="flex flex-col m-2 relative">
            <label for="password" class="text-sm font-thin text-slate-700">Enter your Password</label>
            <input
              class="border border-slate-600 p-2 rounded-md"
              type="password" name="password" id="password" placeholder="Password"
              required minlength="8"
              title="Password must be at least 8 characters"
            >
            <!-- Show/Hide password icon -->
            <span id="close" class="absolute right-3 top-[45%] cursor-pointer" onclick="toggleShowPassword()">
              <svg class="w-6 h-6 text-slate-400 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
              </svg>
            </span>
            <span id="open" class="hidden absolute right-3 top-[45%] cursor-pointer" onclick="toggleShowPassword()">
              <svg class="w-6 h-6 text-slate-400 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
              </svg>
            </span>
          </div>

          <!-- reCAPTCHA widget -->
          <div class="g-recaptcha m-2" data-sitekey="6LdNzUoqAAAAAK-nXUkU2cXhAGThYzrm4bujMUK9"></div>

          <!-- yung sumbit button -->
          <div class="flex">
            <button class="flex-1 px-8 py-4 m-2 bg-yellow-600 text-white duration:300 hover:bg-yellow-900 rounded-lg" type="submit">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
    include '../includes/footer.php';
  ?>

  <!-- JUST A DESIGN -->
  <!-- Pika kupal picture -->
  <div class="hidden md:block absolute bottom-0 right-[20px] group cursor-pointer">
    <div class="thought absolute left-[-40px] z-50 transform -translate-x-1/2 top-2 w-max text-center opacity-0 transition-opacity duration-300 group-hover:opacity-100 shadow-md p-2 rounded-tl-lg rounded-tr-lg rounded-bl-lg">
      KUPAL KABA?
    </div>
    <img class="w-[200px] duration-300 hover:scale-105 z-1" src="/IAS_Activity/public/images/pika-gif.gif" alt="pikachu">
  </div>
  <script src="../scripts/passwordController.js"></script>
</body>
</html>