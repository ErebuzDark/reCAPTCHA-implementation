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

  <!-- my custom css -->
  <link rel="stylesheet" href="/IAS_Activity/app/css/logo-swing.css">
  <link rel="stylesheet" href="/IAS_Activity/app/css/bubblemsg.css">

  <title>Pokekemon | Contact</title>
</head>
<body>
  <?php
    include '../includes/header.php';
  ?>
  
  <div id="toaster" class="hidden fixed top-5 left-[50%] transform -translate-x-1/2 z-50 bg-red-500 text-white p-4 rounded-lg shadow-lg">
    <span id="toaster-message"></span>
  </div>
  <div id="toasterSuccess" class="hidden fixed top-5 left-[50%] transform -translate-x-1/2 z-50 bg-green-500 text-white p-4 rounded-lg shadow-lg">
    <span id="toaster-messageSuccess"></span>
  </div>


  <div class="flex justify-center items-center bg-slate-200 w-full h-[600px] bg-cover bg-center" style="background-image: url('/IAS_Activity/public/images/landing-bg.jpg');">

  <!-- main Div -->
  <div class="flex flex-col m-2 w-[450px] md:w-[500px] h-auto bg-white shadow-lg rounded-lg overflow-hidden bg-cover bg-center" style="background-image: url('/IAS_Activity/public/images/login-bg.jpg');">
    <!-- Header ng form / title -->
    <div class="relative bg-gray-800 overflow-hidden">
      <h1 class="text-center text-white text-[1.4rem] font-bold py-6">Contact</h1>
      <img class="absolute -top-11 -left-8 w-[200px]" src="/IAS_Activity/public/images/pokeball.png" alt="pokeball">
    </div>
    <!-- Main body -->
    <div class="px-4 py-6">
       <!-- onsce na submitted itong path from the action ang pupuntahan -->
      <form action="../actions/contact.process.php" method="POST" id="loginForm">
        <div class="flex flex-col m-2">
          <label for="email" class="text-sm font-thin text-slate-700">Enter your email</label>
          <input
            class="border border-slate-600 p-2 rounded-md"
            type="email" name="email" id="email" placeholder="Email"
            required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            title="Please enter a valid email address"
          >
        </div>
        <div class="flex flex-col m-2 relative">
          <label for="message" class="text-sm font-thin text-slate-700">Enter your message</label>
          <textArea class="border border-slate-600 p-2 rounded-md max-h-[200px] min-h-[100px]"
            type="text" name="message" id="message"required></textArea>
        </div>

        <!-- reCAPTCHA widget -->
        <div class="g-recaptcha m-2" data-sitekey="6LdNzUoqAAAAAK-nXUkU2cXhAGThYzrm4bujMUK9"></div>

        <div class="flex">
          <button class="flex-1 px-8 py-4 m-2 bg-yellow-600 text-white duration:300 hover:bg-yellow-900 rounded-lg" type="submit">Send</button>
        </div>
      </form>
    </div>
  </div>
  </div>

  <?php
  include '../includes/footer.php';
  ?>

  <!-- para sa toaster animation -->
  <script>
  window.onload = function() {
    function showToaster(toasterId, messageText) {
      const toaster = document.getElementById(toasterId);
      const message = toaster.querySelector('span');

      message.innerText = messageText;
      toaster.classList.remove('hidden');
      toaster.classList.add('transition', 'opacity-100', 'translate-y-0');
      toaster.classList.add('opacity-0', 'translate-y-5');

      setTimeout(() => {
        toaster.classList.remove('opacity-0', '-translate-y-5');
        toaster.classList.add('opacity-100', 'translate-y-0');
      }, 10);

      // Hide toaster after 3 seconds
      setTimeout(() => {
        toaster.classList.remove('opacity-100', 'translate-y-0');
        toaster.classList.add('opacity-0', '-translate-y-5');

        // Hide after the animation
        setTimeout(() => {
          toaster.classList.add('hidden');
        }, 500);
      }, 3000);
    }

    <?php if (isset($_SESSION['recaptcha_error'])): ?>
      showToaster('toaster', "<?php echo $_SESSION['recaptcha_error']; ?>");
      <?php unset($_SESSION['recaptcha_error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['recaptcha_success'])): ?>
      showToaster('toasterSuccess', "<?php echo $_SESSION['recaptcha_success']; ?>");
      <?php unset($_SESSION['recaptcha_success']); ?>
    <?php endif; ?>
  };
</script>
  
</body>
</html>