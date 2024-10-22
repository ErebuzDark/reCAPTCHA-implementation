<?php 
session_start();
include '../config/dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $date_created = date("Y-m-d");
  $isFirst = 0;

  if ($password == $confirmPassword) {
    $insert_trainer = "INSERT INTO tbl_trainer (trainer_first_name, trainer_last_name, trainer_email, trainer_password, trainer_account_created, isFirst) VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insert_trainer);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("sssssi", $firstname, $lastname, $email, $hashedPassword, $date_created, $isFirst);
    if ($stmt->execute()) {
      $_SESSION['toast'] = [
        'title' => "Success",
        'message' => 'Signup Successfully',
        'type' => 'success'
      ];
      header("Location: ../views/login.php");
    } else {
      $_SESSION['toast'] = [
        'title' => "Error",
        'message' => 'Server error. Please try again later',
        'type' => 'error'
      ];
      header("Location: ../views/register.php");
    }
    
  } else {
    $_SESSION['toast'] = [
      'title' => "Invalid Input!",
      'message' => 'Passwords must be the same.',
      'type' => 'error'
    ];
    header("Location: ../views/register.php?firstname=$firstname&lastname=$lastname&email=$email");
  }
} else {
  $_SESSION['toast'] = [
    'title' => "Error",
    'message' => 'Invalid request',
    'type' => 'error'
  ];
  header("Location: ../views/register.php");
}