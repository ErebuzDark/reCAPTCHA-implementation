<?php
// DUMMY ACCOUNT PASSWORD = "varonvaron"

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // reCAPTCHA verification
    $recaptcha_secret = ""; // yung secret key
    $recaptcha_response = $_POST['g-recaptcha-response'];
    $user = $_POST['email'];
    $password = $_POST['password'];

    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $response_data = json_decode($verify_response);

    // pag success yung pag verify using json_decode sa itaas
    if ($response_data->success ) {
        // and kung tama yung input ng password "varonvaron"
        if ($password === 'varonvaron') {
            // nag set lang po ako ng session for display ng name(email)
           $_SESSION['user'] = $user;
            header("Location: ../views/dashboard.php"); //then tatalon lang po sa dashboard na mema.
        } else {
            // set lang po ng sessios kung mali ang na input na password.
            $_SESSION['recaptcha_error'] = 'Incorrect password!';
             header("Location: ../views/login.php");
        }
    } else {
         // with with above.. set ng session naman kung failed ang pag verify.
        $_SESSION['recaptcha_error'] = 'reCAPTCHA verification failed. Please try again.';
        header("Location: ../views/login.php");
    }
} else {
    header("Location: ../views/login.php");
    exit();
}
