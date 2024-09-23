<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // reCAPTCHA verification
    $recaptcha_secret = ""; //yung secret key
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // pag verify ng response using json_decode
    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $response_data = json_decode($verify_response);

    // pag success 
    if ($response_data->success ) {
      // nag set lang ng session for display sa front
      $_SESSION['recaptcha_success'] = 'Message Sent.';
      header("Location: ../views/contact.php");
    } else {
      // nag set lang ng session for error for display sa front
      $_SESSION['recaptcha_error'] = 'reCAPTCHA verification failed. Please try again.';
      header("Location: ../views/contact.php");
    }
} else {
    header("Location: ../views/login.php");
    exit();
}
