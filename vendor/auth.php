<?php

session_start();
require_once 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$error_fields = [];

if ($email === '') {
    $error_fields[] = 'email';
}

if ($password === '') {
    $error_fields[] = 'password';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];


    die();
}

$password = md5($password);

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
if (mysqli_num_rows($check_user) > 0) {

    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
        "id" => $user['id'],
        "email" => $user['email'],
    ];

    $response = [
        "status" => true
    ];
    $new_url = 'profile.php';
    header('Location: '.$new_url);
    exit();
 

} else {

    $response = [
        "status" => false,
        "message" => 'Не верный логин или пароль'
    ];

}
?>
