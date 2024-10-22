<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Pokekemon | Home</title>

  <!-- API -->
  <script src="https://unpkg.com/intro.js/intro.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/intro.js/introjs.css">
  <script src="https://unpkg.com/@sjmc11/tourguidejs/dist/tour.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://unpkg.com/@sjmc11/tourguidejs/dist/css/tour.min.css">

  <!-- gologloglo font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nova+Mono&family=Rubik+Mono+One&display=swap" rel="stylesheet">



  <!-- my custom css and js -->
  <link rel="stylesheet" href="/IAS_Activity/app/css/logo-swing.css">

</head>
<style>
  *{font-family: 'Archivo Black', sans-serif;}
  </style>
<body>
  <?php
    include '../includes/header.php';
  ?>
<div data-tg-tour="My first tour"> <p>Hello World</p> </div>

<?php if(isset($_SESSION['start_tour'])):?>
<script>
  const tg = new tourguide.TourGuideClient();
  tg.start()
</script>';
<?php unset($_SESSION['start_tour']);?>
<?php endif;?>
</body>
</html>