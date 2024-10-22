<?php
include "../config/dbconnection.php";
// DUMMY ACCOUNT PASSWORD = "varonvaron"

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // reCAPTCHA verification
    $recaptcha_secret = "6LdNzUoqAAAAAMaOfu9u90_rXC87p5mwqq6hRox4"; // yung secret key
    $recaptcha_response = $_POST['g-recaptcha-response'];
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $response_data = json_decode($verify_response);

    // pag success yung pag verify using json_decode sa itaas
    if ($response_data->success ) {
        $verifyAcc = "SELECT trainer_password, isFirst FROM tbl_trainer WHERE trainer_email = ?";
        $verifyAcc = $conn->prepare($verifyAcc);
        $verifyAcc->bind_param('s', $email);
        $verifyAcc->execute();
        $updateStatus = 0;
        $result = $verifyAcc->get_result();
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['trainer_password'])) {
                $_SESSION['user'] = $email;
                if ($row['isFirst'] == 1) {
                    $updateExp = $conn->prepare("UPDATE tbl_trainer SET isFirst = ? WHERE trainer_email = ?");
                    $updateExp->bind_param('is', $updateStatus, $email);
                    $updateExp->execute();
                    $_SESSION['start_tour'] = true;
                }
                header("Location: ../views/dashboard.php"); //then tatalon lang po sa dashboard na mema.
            } else {
                // set lang po ng sessio kung mali ang na input na password.
                $_SESSION['toast'] = [
                    'title' => "Error",
                    'message' => 'Incorrect email or password!',
                    'type' => 'error'
                ];
                header("Location: ../views/login.php?email=$email");
            }
        } else {
            $_SESSION['toast'] = [
                'title' => "Error",
                'message' => 'Email can not found!',
                'type' => 'error'
            ];
            header("Location: ../views/login.php?email=$email");
        }

    } else {
         // with with above.. set ng session naman kung failed ang pag verify.
         $_SESSION['toast'] = [
            'title' => "Error",
            'message' => 'Verification failed!',
            'type' => 'error'
        ];
        header("Location: ../views/login.php?email=$email");
    }
} else {
    $_SESSION['toast'] = [
        'title' => "Error",
        'message' => 'Invalid Request',
        'type' => 'error'
    ];
    header("Location: ../views/login.php?email=$email");
    exit();
}
