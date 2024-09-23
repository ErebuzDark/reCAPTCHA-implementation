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
  <title>Document</title>
</head>
<body>
  <h1>Welcome <?php echo $_SESSION['user']?></h1>

  <form action="../actions/logout.process.php" method="POST">
    <button class="px-8 p-2 bg-slate-200 hover:bg-slate-400" type="submit" name="logout">Logout</button>
  </form>
</body>
</html>