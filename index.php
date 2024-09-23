<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">

  <!-- my customer css -->
  <link rel="stylesheet" href="/IAS_Activity/app/css/fade-text.css">
  <link rel="stylesheet" href="/IAS_Activity/app/css/logo-swing.css">

  <title>Pokekemon</title>
</head>
<body>

  <?php
    include "app/includes/header.php";
  ?>


<div class="bg-cover bg-center h-[500px] md:h-[700px] relative" style="background-image: url('public/images/landing-bg.jpg');">
  <div class="absolute inset-0 bg-black opacity-25"></div>
  <div class="relative flex flex-col">
    <h1 class="text-center text-[60px] md:text-[70px] lg:text-[120px] text-white font-bold pt-40 leading-[0.7] opacity-80" style="font-family: 'Archivo Black', sans-serif;">
      POKEKEMON
    </h1>
    <p class="fade-text text-center text-[19px] md:text-[24px] text-white font-thin pt-0 tracking-[8px] md:tracking-[20px] opacity-80">
      CATCH THEM ALL
    </p>
    <div class="flex justify-center m-8">
      <a class="p-4 px-12 m-8 bg-orange-500 w-[300px] text-center text-white opacity-100 font-bold rounded-lg duration-300 hover:font-black hover:bg-orange-600 hover:rounded-2xl shadow-lg hover:shadow-xl" href="http://localhost/IAS_Activity/app/views/login.php">
        Catch Pokekemon
      </a>
    </div>
  </div>
</div>



  <?php
    include "app/includes/footer.php";
  ?>

</body>
</html>